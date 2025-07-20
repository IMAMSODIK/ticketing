<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JenisTiketController;
use App\Http\Middleware\CheckRole;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

\Carbon\Carbon::setLocale('id');

Route::get('/', function () {
    $data = [
        'pageTitle' => "Daftar Event",
        'count_event' => Event::count(),
        'pageTitle' => 'Home - ' . env('APP_NAME', 'Ticketing'),
        'appName' => env('APP_NAME', 'Ticketing')
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

        return view('welcome', $data);
    } catch (Exception $e) {
        dd($e->getMessage());
    }
});

Route::get('/event/detail-event', function(Request $r){
    $data = [
        'pageTitle' => "Detail Event",
        'appName' => env('APP_NAME', 'Ticketing')
    ];

    try {
        $event = Event::with('kota', 'jenisTiket', 'creator', 'updater')->where('id', $r->id)->first();
        $data['event'] = $event;

        return view('event.detail-user', $data);
    } catch (Exception $e) {
        dd($e->getMessage());
    }
});

Route::middleware(['guest'])->group(function () {
    Route::get('/login', function () {
        $data = [
            'pageTitle' => 'Home - ' . env('APP_NAME', 'Ticketing'),
            'appName' => env('APP_NAME', 'Ticketing')
        ];

        return view('auth.login', $data);
    })->name('login');

    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle']);
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user-dashboard', function () {
        return view('user.dashboard');
    });
});

Route::middleware(['auth'])->group(function () {
    Route::middleware([CheckRole::class . ':user'])->group(function () {
        Route::get('/user-dashboard', [DashboardController::class, 'indexUser'])->name('user.dashboard'); 
    });

    Route::middleware([CheckRole::class . ':admin'])->group(function () {
        Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/event', [EventController::class, 'index'])->name('event');
        Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/event/store', [EventController::class, 'store']);
        Route::get('/event/detail', [EventController::class, 'detail'])->name('event.detail');
        Route::post('/event/delete', [EventController::class, 'delete']);

        Route::get('/jenis-tiket', [JenisTiketController::class, 'index'])->name('tiket');
        Route::post('/jenis-tiket/store', [JenisTiketController::class, 'store']);
        Route::get('/jenis-tiket/edit', [JenisTiketController::class, 'edit']);
        Route::post('/jenis-tiket/update', [JenisTiketController::class, 'update']);
        Route::post('/jenis-tiket/delete', [JenisTiketController::class, 'delete']);
    });

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

});
