<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
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
}
