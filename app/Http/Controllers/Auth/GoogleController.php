<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Http\Request;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback(Request $request)
    {
        try {
            $googleUser = Socialite::driver('google')->user();

            $user = User::updateOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'avatar' => $googleUser->getAvatar(),
                    'email_verified_at' => now(),
                    'password' => bcrypt(Str::random(16)),
                ]
            );

            Auth::login($user);

            $intendedUrl = session()->pull('url.intended');
        
            if ($intendedUrl) {
                return redirect($intendedUrl);
            }

            if ($user->role === 'admin') {
                return redirect('/admin-dashboard');
            } else {
                return redirect('/user-dashboard');
            }

        } catch (\Throwable $e) {
            return redirect('/login')->with('error', "Terjadi Kesalahan");
        }
    }
}
