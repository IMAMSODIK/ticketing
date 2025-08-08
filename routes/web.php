<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JenisTiketController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WebSettingController;
use App\Http\Middleware\CheckRole;
use App\Models\Event;
use App\Models\WebSetting;
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
        'appName' => env('APP_NAME', 'Ticketing'),
        'web_profile' => WebSetting::first()
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

// Route::middleware(['auth'])->group(function () {
//     Route::get('/user-dashboard', function () {
//         return view('user.dashboard');
//     });
// });

Route::middleware(['auth'])->group(function () {
    Route::middleware([CheckRole::class . ':user'])->group(function () {
        Route::get('/user-dashboard', [DashboardController::class, 'indexUser'])->name('user.dashboard'); 

        Route::get('/event/checkout-pre', [EventController::class, 'prepareCheckout']);
        Route::get('/event/checkout-lanjut', [EventController::class, 'checkoutLanjut']);
        Route::post('/event/checkout', [EventController::class, 'checkout']);

        Route::post('/order/store', [OrderController::class, 'store']);
        Route::post('/order/get-token', [OrderController::class, 'getSnapToken']);
    });

    Route::middleware([CheckRole::class . ':admin'])->group(function () {
        Route::get('/admin-dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

        Route::get('/event', [EventController::class, 'index'])->name('event');
        Route::get('/event/create', [EventController::class, 'create'])->name('event.create');
        Route::post('/event/store', [EventController::class, 'store']);
        Route::get('/event/detail', [EventController::class, 'detail'])->name('event.detail');
        Route::get('/event/edit', [EventController::class, 'edit'])->name('event.edit');
        Route::post('/event/update', [EventController::class, 'update']);
        Route::post('/event/delete', [EventController::class, 'delete']);

        Route::get('/jenis-tiket', [JenisTiketController::class, 'index'])->name('tiket');
        Route::post('/jenis-tiket/store', [JenisTiketController::class, 'store']);
        Route::get('/jenis-tiket/edit', [JenisTiketController::class, 'edit']);
        Route::post('/jenis-tiket/update', [JenisTiketController::class, 'update']);
        Route::post('/jenis-tiket/delete', [JenisTiketController::class, 'delete']);

        Route::post('/tiket/store', [JenisTiketController::class, 'store']);
        Route::get('/tiket/edit', [JenisTiketController::class, 'edit']);
        Route::post('/tiket/update', [JenisTiketController::class, 'update']);
        Route::post('/tiket/status', [JenisTiketController::class, 'updateStatus']);

        Route::get('/penjualan', [OrderController::class, 'index']);
        Route::get('/penjualan/detail', [OrderController::class, 'detail']);
        Route::get('/orders/receipt', [OrderController::class, 'receipt']);
        Route::post('/send-email-receipt', [OrderController::class, 'sendReceiptEmail']);
        Route::get('/penjualan/export/pdf', [OrderController::class, 'exportPdf'])->name('penjualan.export.pdf');

        // Route::get('/laporan', [LaporanController::class, 'index']);
        // Route::get('/laporan/detail', [LaporanController::class, 'detail']);

        Route::get('/user', [UserController::class, 'index'])->name('user');
        Route::get('/user/detail', [UserController::class, 'detail']);
        Route::post('/user/update-status', [UserController::class, 'update']);

        Route::get('/web-settings', [WebSettingController::class, 'index'])->name('web-setting');
        Route::post('/web-settings/update', [WebSettingController::class, 'update']);
    });

    Route::post('/logout', function () {
        Auth::logout();
        return redirect('/');
    })->name('logout');

});
