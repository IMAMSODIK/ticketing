<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\JenisTiketController;
use App\Http\Middleware\CheckRole;
use Illuminate\Support\Facades\Auth;

\Carbon\Carbon::setLocale('id');

Route::get('/', function () {
    $data = [
        'pageTitle' => 'Home - ' . env('APP_NAME', 'Ticketing'),
        'appName' => env('APP_NAME', 'Ticketing')
    ];
    return view('welcome', $data);
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
