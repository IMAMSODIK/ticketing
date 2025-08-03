<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => "Dashboard"
        ];
        return view('dashboard.index', $data);
    }

    public function indexUser(){
        $orders = Order::with(['jenisTiket.event'])
                    ->where('user_id', Auth::id())
                    ->get()
                    ->groupBy('status');

        $data = [
            'pageTitle' => "Dashboard",
            'appName' => env('APP_NAME', 'Ticketing'),
            'order' => $orders
        ];
        return view('dashboard.index_user', $data);
    }
}
