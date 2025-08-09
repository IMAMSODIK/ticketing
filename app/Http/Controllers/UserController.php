<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\User;
use App\Models\WebSetting;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'User',
            'users' => User::where('role', 'user')->get()
        ];

        return view('user.index', $data);
    }

    public function update(Request $r)
    {
        try {
            $user = User::where('id', $r->id)->get();

            if ($user) {
                if ($user->status == 1) {
                    $user->status = 0;
                } else {
                    $user->status = 1;
                }
            }

            $user->save();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil memperbarui user.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }

    public function verifikasiPeserta(Request $r)
    {
        try {
            $dataOrder = Order::with(['jenisTiket', 'user'])
                            ->where('order_id', $r->order_id)
                            ->where('id', $r->id)
                            ->first();
            dd($dataOrder);

            return view('verifikasi.verif', [
                'pageTitle' => 'Home - ' . env('APP_NAME', 'Ticketing'),
                'appName' => env('APP_NAME', 'Ticketing'),
                'web_profile' => WebSetting::first(),
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
