<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function store(Request $r)
    {
        $validated = $r->validate([
            'status' => 'required|string|max:255'
        ]);

        // $table->foreignId('user_ud');
        // $table->foreignId('jenis_tiket_id');
        // $table->integer('jumlah');
        // $table->enum('status', ['pending', 'aktif', 'batal']);

        try {
            DB::beginTransaction();

            foreach(json_decode($r->data, true) as $ticket){
                $order = Order::create([
                    'user_id' => Auth::id(),
                    'jenis_tiket_id' => $ticket['id'],
                    'jumlah' => $ticket['jumlah'],
                    'status' => $r->status
                ]);
            }

            // if (!empty($r->tickets)) {
            //     $tickets = json_decode($r->tickets, true);

            //     foreach ($tickets as $ticket) {
            //         JenisTiket::create([
            //             'nama' => $ticket['nama'],
            //             'harga' => $ticket['harga'],
            //             'kuota' => $ticket['kuota'],
            //             'deskripsi' => $ticket['deskripsi'] ?? null,
            //             'event_id' => $event->id,
            //         ]);
            //     }
            // }

            DB::commit();
            return response()->json(
                [
                    'status' => true,
                    'message' => 'Event berhasil disimpan!',
                    'data' => $order
                ]
            );
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['status' => false, 'message' => 'Gagal menyimpan data', 'error' => $e->getMessage()], 500);
        }
    }
}
