<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use Illuminate\Support\Facades\DB;

class EventController extends Controller
{
    public function index(){
        $data = [
            'pageTitle' => "Daftar Event"
        ];
        return view('event.index', $data);
    }

    public function create(){
        $data = [
            'pageTitle' => "Buat Event",
            'appName' => env('APP_NAME', 'Ticketing'),
            'kotas' => DB::table('indonesia_cities')->get()
        ];
        return view('event.create', $data);
    }
}
