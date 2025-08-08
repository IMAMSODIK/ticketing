<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\JenisTiket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $data = [
            'pageTitle' => "Daftar Event",
            'count_event' => Event::count(),
            'count_event_done' => Event::where('status', '!=', 'Aktif')->count(),
            'count_event_aktif' => Event::where('status', 'Aktif')->count(),
        ];

        try {
            $kotaIds = $request->input('kota');
            $eventQuery = Event::with('kota', 'jenisTiket', 'creator', 'updater')
                ->where('tanggal_mulai', '>=', Carbon::today());

            if (!empty($kotaIds)) {
                $eventQuery->whereIn('kota_id', (array) $kotaIds);
            }

            $events = $eventQuery->orderBy('tanggal_mulai', 'asc')
                ->take(8)
                ->get();

            $kotas = DB::table('indonesia_cities')->get();

            $data['events'] = $events;
            $data['kotas'] = $kotas;

            return view('event.index', $data);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function create()
    {
        $data = [
            'pageTitle' => "Buat Event",
            'appName' => env('APP_NAME', 'Ticketing'),
            'kotas' => DB::table('indonesia_cities')->get()
        ];
        return view('event.create', $data);
    }

    public function store(Request $r)
    {
        $validated = $r->validate([
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'title' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            'nama_tempat' => 'required|string|max:255',
            'kota_id' => 'required',
            // 'link_maps' => 'nullable|string',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        try {
            DB::beginTransaction();

            if ($r->hasFile('thumbnail')) {
                $path = $r->file('thumbnail')->store('thumbnails', 'public');
            } else {
                $path = null;
            }

            $tanggal_mulai = Carbon::createFromFormat('m/d/Y', $r->tanggal_mulai)->format('Y-m-d');
            $tanggal_selesai = Carbon::createFromFormat('m/d/Y', $r->tanggal_selesai)->format('Y-m-d');


            $event = Event::create([
                'thumbnail' => $path,
                'title' => $validated['title'],
                'tanggal_mulai' => $tanggal_mulai,
                'tanggal_selesai' => $tanggal_selesai,
                'waktu_mulai' => $validated['waktu_mulai'],
                'waktu_selesai' => $validated['waktu_selesai'],
                'kota_id' => $validated['kota_id'],
                'nama_tempat' => $validated['nama_tempat'],
                // 'koordinat_lokasi' => $validated['link_maps'] ?? null,
                'alamat' => $validated['alamat'],
                'deskripsi' => $validated['deskripsi'],
                'created_by' => Auth::id(),
                'updated_by' => Auth::id(),
                'status' => 'Aktif',
            ]);

            if (!empty($r->tickets)) {
                $tickets = json_decode($r->tickets, true);

                foreach ($tickets as $ticket) {
                    JenisTiket::create([
                        'nama' => $ticket['nama'],
                        'harga' => $ticket['harga'],
                        'kuota' => $ticket['kuota'],
                        'deskripsi' => $ticket['deskripsi'] ?? null,
                        'event_id' => $event->id,
                    ]);
                }
            }

            DB::commit();
            return response()->json(['status' => true, 'message' => 'Event berhasil disimpan!']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Gagal menyimpan data', 'error' => $e->getMessage()], 500);
        }
    }

    public function update(Request $r)
    {
        $validated = $r->validate([
            'id' => 'required',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'title' => 'required|string|max:255',
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'waktu_mulai' => 'required|date_format:H:i',
            'waktu_selesai' => 'required|date_format:H:i',
            'nama_tempat' => 'required|string|max:255',
            'kota_id' => 'required',
            'alamat' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        try {
            if ($r->hasFile('thumbnail')) {
                $path = $r->file('thumbnail')->store('thumbnails', 'public');
            } else {
                $path = null;
            }

            $tanggal_mulai = Carbon::parse($r->tanggal_mulai)->format('Y-m-d');
            $tanggal_selesai = Carbon::parse($r->tanggal_selesai)->format('Y-m-d');

            $event = Event::findOrFail($validated['id']);
            $event->update([
                'thumbnail' => $path,
                'title' => $validated['title'],
                'tanggal_mulai' => $tanggal_mulai,
                'tanggal_selesai' => $tanggal_selesai,
                'waktu_mulai' => $validated['waktu_mulai'],
                'waktu_selesai' => $validated['waktu_selesai'],
                'kota_id' => $validated['kota_id'],
                'nama_tempat' => $validated['nama_tempat'],
                'alamat' => $validated['alamat'],
                'deskripsi' => $validated['deskripsi'],
                'updated_by' => Auth::id(),
                'status' => 'Aktif',
            ]);

            return response()->json(['status' => true, 'message' => 'Event berhasil disimpan!']);
        } catch (\Exception $e) {
            return response()->json(['status' => false, 'message' => 'Gagal menyimpan data', 'error' => $e->getMessage()], 500);
        }
    }

    public function edit(Request $r)
    {
        $data = [
            'pageTitle' => "Edit Event",
            'appName' => env('APP_NAME', 'Ticketing'),
            'kotas' => DB::table('indonesia_cities')->get()
        ];

        try {
            $event = Event::with('kota', 'jenisTiket', 'creator', 'updater')->where('id', $r->id)->first();
            $data['event'] = $event;

            return view('event.edit', $data);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function detail(Request $r)
    {
        $data = [
            'pageTitle' => "Detail Event"
        ];

        try {
            $event = Event::with('kota', 'jenisTiket', 'creator', 'updater')->where('id', $r->id)->first();
            $data['event'] = $event;

            return view('event.detail', $data);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function delete(Request $r)
    {
        try {
            DB::beginTransaction();

            $event = Event::findOrFail($r->id);
            if ($event->thumbnail && Storage::disk('public')->exists($event->thumbnail)) {
                Storage::disk('public')->delete($event->thumbnail);
            }

            $event->delete();

            DB::commit();
            return response()->json(['status' => true, 'message' => 'Event berhasil dihapus.']);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => 'Gagal menghapus event.',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    public function prepareCheckout(Request $request)
    {
        if (Auth::check()) {
            return redirect('/user-dashboard');
        }

        session(['url.intended' => '/event/checkout-pre']);
        return redirect('/auth/google');
    }

    public function checkoutLanjut()
    {
        return view('event.checkout-lanjut');
    }

    public function checkout(Request $request)
    {
        $tiketData = json_decode($request->tiketData, true);

        return response()->json([
            'status' => true,
            'message' => 'Pembayaran berhasil'
        ]);
    }
}
