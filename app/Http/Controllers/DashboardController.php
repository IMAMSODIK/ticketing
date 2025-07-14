<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => "Dashboard"
        ];
        return view('dashboard.index', $data);
    }

    public function indexUser(){
        $data = [
            'pageTitle' => "Dashboard",
            'appName' => env('APP_NAME', 'Ticketing')
        ];
        return view('dashboard.index_user', $data);
    }
}
