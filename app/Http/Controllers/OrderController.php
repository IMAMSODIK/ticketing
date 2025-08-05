<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\JenisTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Midtrans\Snap;
use Midtrans\Config;

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
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'jenis_tiket_id' => $ticket['id'],
                    'jumlah' => $ticket['jumlah'],
                    'status' => $r->status
                ]);
            }

            DB::commit();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Event berhasil disimpan!',
                    'data' => $order
                ]
            );
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
        Config::$serverKey = config('midtrans.server_key');
        Config::$clientKey = config('midtrans.client_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = config('midtrans.is_sanitized');
        Config::$is3ds = config('midtrans.is_3ds');
        Log::info('IHIK 2:', [
            'server' => config('midtrans.server_key'),
            'client' => config('midtrans.client_key'),
            'prod'   => config('midtrans.is_production'),
        ]);
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
        }

        return response()->json(['message' => 'Callback diproses']);
    }


    private function hitungTotal(array $tickets): int
    {
        return array_reduce($tickets, function ($carry, $tiket) {
            return $carry + ($tiket['harga'] * $tiket['jumlah']);
        }, 0);
    }
}
