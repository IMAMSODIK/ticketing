<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Order;
use App\Models\WebSetting;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LaporanController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => "Daftar Event",
            'count_event' => Event::count(),
            'count_event_done' => Event::where('status', '!=', 'Aktif')->count(),
            'count_event_aktif' => Event::where('status', 'Aktif')->count(),
        ];

        try {
            $events = Event::with('kota', 'jenisTiket', 'creator', 'updater')
                ->where('tanggal_mulai', '>=', Carbon::today())
                ->orderBy('tanggal_mulai', 'asc')
                ->take(8)
                ->get();
            $kotas = DB::table('indonesia_cities')->get();

            $data['events'] = $events;
            $data['kotas'] = $kotas;

            return view('laporan.index', $data);
        } catch (Exception $e) {
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
}
