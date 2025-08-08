<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\JenisTiket;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $totalEvent = Event::count();
        $totalUser = User::count();
        $totalTiketTerjual = JenisTiket::sum('terjual');
        $totalPendapatan = Order::join('jenis_tikets', 'orders.jenis_tiket_id', '=', 'jenis_tikets.id')
            ->where('orders.status', 'aktif')
            ->select(DB::raw('SUM(jenis_tikets.harga * orders.jumlah) as total'))
            ->value('total');

        return view('dashboard.index', [
            'pageTitle' => 'Dashboard',
            'totalEvent' => $totalEvent,
            'totalUser' => $totalUser,
            'totalTiketTerjual' => $totalTiketTerjual,
            'totalPendapatan' => $totalPendapatan,
        ]);
    }

    public function indexUser()
    {
        $orders = Order::with(['jenisTiket.event'])
            ->where('user_id', Auth::id())
            ->get()
            ->map(function ($order) {
                $qr = DB::table('qr_tikets')->where('order_id', $order->order_id)->first();
                $order->qr_code = $qr->qr_code ?? null;
                return $order;
            })
            ->groupBy('status');

        return view('dashboard.index_user', [
            'pageTitle' => "Dashboard",
            'appName' => env('APP_NAME', 'Ticketing'),
            'order' => $orders
        ]);
    }
}
