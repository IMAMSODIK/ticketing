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

class EventController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => "Daftar Event"
        ];

        try{
            $events = Event::with('kota', 'jenisTiket', 'creator', 'updater')->get();
            $data['events'] = $events;

            return view('event.index', $data);
        }catch(Exception $e){
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
}
