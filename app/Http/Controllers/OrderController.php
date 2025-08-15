<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Mail\OrderReceiptMail;
use App\Models\Event;
use App\Models\JenisTiket;
use App\Models\QrTiket;
use App\Models\WebSetting;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Midtrans\Snap;
use Midtrans\Config;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Barryvdh\DomPDF\Facade\Pdf;

class OrderController extends Controller
{
    public function store(Request $r)
    {
        $validated = $r->validate([
            'status' => 'required|string|max:255'
        ]);

        try {

            DB::beginTransaction();

            foreach (json_decode($r->data, true) as $ticket) {
                $tiket = JenisTiket::findOrFail($ticket['id']);

                if($tiket->kuota < $ticket['jumlah']) {
                    return response()->json(['status' => false, 'message' => 'Kuota ' . $tiket->nama . ' tidak mencukupi'], 400);
                }
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'jenis_tiket_id' => $ticket['id'],
                    'jumlah' => $ticket['jumlah'],
                    'jumlah_tiket' => $ticket['jumlah'],
                    'status' => $r->status
                ]);

                DB::commit();
                return response()->json(
                    [
                        'status' => true,
                        'message' => 'Event berhasil disimpan!',
                        'data' => $order
                    ]
                );
            }
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Gagal menyimpan data', 'error' => $e->getMessage()], 500);
        }
    }

    public function getSnapToken(Request $request)
    {
        Log::info('IHIK:', [
            'server' => config('midtrans.server_key'),
            'client' => config('midtrans.client_key'),
            'prod'   => config('midtrans.is_production'),
        ]);

        $dibeli = json_decode($request->tiket_dibeli, true);
        $dibatalkan = json_decode($request->tiket_dibatalkan, true);
        $user = Auth::user();

        $orderId = 'INV-' . time() . '-' . uniqid();

        DB::beginTransaction();
        try {
            $total = 0;
            foreach ($dibeli as $item) {
                $order = Order::where('id', $item['id'])->first();

                if (!$order || $order->user_id !== Auth::id()) {
                    throw new \Exception("Data order tidak valid atau bukan milik user.");
                }

                $jenisTiket = JenisTiket::where('id', $order->jenis_tiket_id)->first();
                if (!$jenisTiket) {
                    throw new \Exception("Jenis tiket tidak ditemukan.");
                }

                if($jenisTiket->kuota < $order->jumlah) {
                    throw new \Exception("Kuota tidak mencukupi untuk jenis tiket: " . $jenisTiket->nama);
                }

                $harga = $jenisTiket->harga;
                $total += $harga * $order->jumlah;

                $order->update([
                    'order_id' => $orderId
                ]);
            }

            foreach ($dibatalkan as $item) {
                Order::where('id', $item['id'])->update([
                    'status' => 'batal'
                ]);
            }

            Config::$serverKey = config('midtrans.server_key');
            Config::$clientKey = config('midtrans.client_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = config('midtrans.is_sanitized');
            Config::$is3ds = config('midtrans.is_3ds');

            $params = [
                'transaction_details' => [
                    'order_id' => $orderId,
                    'gross_amount' => $total,
                ],
                'customer_details' => [
                    'first_name' => $user->name,
                    'email' => $user->email,
                ]
            ];

            $snapToken = Snap::getSnapToken($params);

            DB::commit();
            return response()->json(['token' => $snapToken]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function handleCallback(Request $request)
    {
        try {
            Config::$serverKey = config('midtrans.server_key');
            Config::$clientKey = config('midtrans.client_key');
            Config::$isProduction = config('midtrans.is_production');
            Config::$isSanitized = config('midtrans.is_sanitized');
            Config::$is3ds = config('midtrans.is_3ds');

            $data = $request->all();
            $signatureKey = $data['signature_key'] ?? null;

            $serverKey = config('midtrans.server_key');
            $expectedSignature = hash('sha512', $data['order_id'] . $data['status_code'] . $data['gross_amount'] . $serverKey);

            if ($signatureKey !== $expectedSignature) {
                return response()->json(['message' => 'Invalid signature'], 403);
            }

            $notif = new \Midtrans\Notification();

            $transactionStatus = $notif->transaction_status;
            $paymentType = $notif->payment_type;
            $fraudStatus = $notif->fraud_status;
            $orderId = $notif->order_id;

            DB::beginTransaction();

            $orders = Order::where('order_id', $orderId)->get();

            if ($orders->isEmpty()) {
                return response()->json(['message' => 'Order tidak ditemukan'], 404);
            }

            $updateData = [
                'transaction_status' => $transactionStatus,
                'payment_type' => $paymentType,
                'fraud_status' => $fraudStatus,
                'paid_at' => now()
            ];

            if (!empty($notif->va_numbers[0])) {
                $updateData['va_number'] = $notif->va_numbers[0]->va_number;
                $updateData['bank'] = $notif->va_numbers[0]->bank;
            }

            if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
                $updateData['status'] = 'aktif';
            } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
                $updateData['status'] = 'batal';
            }

            foreach ($orders as $order) {
                $order->update($updateData);

                if ($updateData['status'] === 'aktif') {
                    $url = url('/peserta?id='. $order->id . '&order_id=' . $order->order_id);
                    $qrImage = QrCode::format('png')->size(300)->generate($url);

                    $fileName = 'qrcode_' . uniqid() . '.png';
                    $path = 'qrcodes/' . $fileName;

                    Storage::disk('public')->put($path, $qrImage);

                    QrTiket::create([
                        'order_id' => $order->order_id,
                        'qr_code' => 'storage/' . $path,
                        'scan_count' => $order->jumlah
                    ]);

                    $tiket = JenisTiket::where('id', $order->jenis_tiket_id)->first();
                    $tiket->terjual += $order->jumlah;
                    $tiket->save();
                }
            }

            DB::commit();
            return response()->json(['message' => 'Callback diproses']);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()]);
        }
    }


    private function hitungTotal(array $tickets): int
    {
        return array_reduce($tickets, function ($carry, $tiket) {
            return $carry + ($tiket['harga'] * $tiket['jumlah']);
        }, 0);
    }

    public function index(Request $request)
    {
        $data = [
            'pageTitle' => "Daftar Event",
        ];

        try {
            $kotaId = $request->input('kota');

            $eventQuery = Event::with('kota', 'jenisTiket', 'creator', 'updater')
                ->where('tanggal_mulai', '>=', Carbon::today());

            if (!empty($kotaId)) {
                $eventQuery->where('kota_id', $kotaId);
            }

            $baseQuery = clone $eventQuery;

            $data['count_event'] = $baseQuery->count();
            $data['count_event_done'] = (clone $baseQuery)->where('status', '!=', 'Aktif')->count();
            $data['count_event_aktif'] = (clone $baseQuery)->where('status', 'Aktif')->count();

            $events = $eventQuery->orderBy('tanggal_mulai', 'asc')
                ->take(8)
                ->get();

            $kotas = DB::table('indonesia_cities')->get();

            $data['events'] = $events;
            $data['kotas'] = $kotas;
            $data['selectedKota'] = $kotaId;

            return view('penjualan.index', $data);
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }



    public function detail(Request $r)
    {
        try {
            $eventId = $r->id;

            if (!$eventId) {
                return redirect()->back()->with('error', 'Event ID tidak ditemukan.');
            }

            $orders = Order::with(['user', 'jenisTiket'])
                ->whereHas('jenisTiket', function ($q) use ($eventId) {
                    $q->where('event_id', $eventId);
                })
                ->get();

            return view('penjualan.detail', [
                'web_profile' => WebSetting::first(),
                'event' => Event::where("id", $eventId)->pluck('title')->first(),
                'orders' => $orders,
                'pageTitle' => 'Laporan Penjualan Tiket'
            ]);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat data.');
        }
    }

    public function receipt(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:orders,id'
        ]);

        $order = Order::with(['user', 'jenisTiket.event'])->find($request->id);

        if (!$order) {
            return response()->json([
                'status' => false,
                'message' => 'Data pesanan tidak ditemukan.'
            ]);
        }

        $order->formatted_paid_at = $order->paid_at
            ? \Carbon\Carbon::parse($order->paid_at)->translatedFormat('d F Y H:i')
            : '-';

        $order->total_formatted = number_format($order->total, 0, ',', '.');

        return response()->json([
            'status' => true,
            'data' => $order,
        ]);
    }

    public function sendReceiptEmail(Request $request)
    {
        $order = Order::with('user', 'jenisTiket.event')->find($request->order_id);
        $webSettings = WebSetting::first();
        $qr = QrTiket::where('order_id', $order->order_id)->first();

        if (!$order || !$order->user) {
            return response()->json(['status' => false, 'message' => 'Order tidak ditemukan atau user tidak ada']);
        }

        Mail::to($order->user->email)->send(new OrderReceiptMail($order, $webSettings, $qr));

        return response()->json(['status' => true]);
    }

    public function exportPdf(Request $request)
    {
        $eventId = $request->event_id;

        $orders = Order::with(['user', 'jenisTiket'])
            ->whereHas('jenisTiket', function ($q) use ($eventId) {
                $q->where('event_id', $eventId);
            });

        if ($request->status) {
            $orders->where('status', $request->status);
        }

        if ($request->jenis_tiket) {
            $orders->whereHas('jenisTiket', function ($q) use ($request) {
                $q->where('nama', $request->jenis_tiket);
            });
        }

        $orders = $orders->get();

        $pdf = Pdf::loadView('penjualan.laporan', [
            'orders' => $orders,
            'event' => Event::find($eventId),
            'filter' => [
                'status' => $request->status,
                'jenis_tiket' => $request->jenis_tiket,
            ]
        ])->setPaper('A4', 'landscape');

        return $pdf->download('laporan.pdf');
    }
}
