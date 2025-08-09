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
            $dataOrder = Order::with(['jenisTiket.event', 'user'])
                            ->where('order_id', $r->order_id)
                            ->where('id', $r->id)
                            ->first();

            return view('verifikasi.verif', [
                'pageTitle' => 'Home - ' . env('APP_NAME', 'Ticketing'),
                'appName' => env('APP_NAME', 'Ticketing'),
                'web_profile' => WebSetting::first(),
                'data' => $dataOrder
            ]);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function verifikasiPesertaAksi(Request $r){
        try {
            $dataOrder = Order::with(['jenisTiket.event', 'user'])
                            ->where('order_id', $r->order)
                            ->where('id', $r->id)
                            ->first();
            dd($dataOrder);

            if($dataOrder){
                if($dataOrder->jumlah > 0){
                    $dataOrder->jumlah -= 1;
                    $dataOrder->save();

                    return response()->json([
                        'status' => true,
                    ]);
                }else{
                    return response()->json([
                        'status' => false,
                        'message' => 'Tiket sudah digunakan'
                    ]);
                }
            }

            return response()->json([
                'status' => false,
                'message' => 'Data tidak ditemukan'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
