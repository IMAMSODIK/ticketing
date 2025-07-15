<?php

namespace App\Http\Controllers;

use App\Models\JenisTiket;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJenisTiketRequest;
use App\Http\Requests\UpdateJenisTiketRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class JenisTiketController extends Controller
{
    public function index()
    {
        $data = [
            'pageTitle' => 'Jenis Tiket',
            'tikets' => JenisTiket::all()
        ];

        return view('tiket.index', $data);
    }

    public function store(Request $r)
    {
        try {
            $validated = $r->validate([
                'nama' => 'required|string|max:255',
                'harga' => 'required|numeric|min:0',
                'kuota' => 'required|integer|min:0',
                'deskripsi' => 'nullable|string',
            ]);

            JenisTiket::create($validated);

            return response()->json([
                'status' => true,
                'message' => 'Jenis tiket berhasil ditambahkan.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal. Pastikan semua field terisi dengan benar.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal menyimpan jenis tiket: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menyimpan data. Silakan coba lagi.',
            ], 500);
        }
    }

    public function edit(Request $r)
    {
        try {
            $validated = $r->validate([
                'id' => 'required|exists:jenis_tikets,id'
            ]);

            $tiket = JenisTiket::findOrFail($validated['id']);

            return response()->json([
                'status' => true,
                'data' => $tiket
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal. Pastikan data yang dikirim benar.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal memuat jenis tiket: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat memuat data. Silakan coba lagi.',
            ], 500);
        }
    }

    public function update(Request $r)
    {
        try {
            $validated = $r->validate([
                'id' => 'required|exists:jenis_tikets,id',
                'nama' => 'required|string|max:255',
                'harga' => 'required|numeric|min:0',
                'kuota' => 'required|integer|min:0',
                'deskripsi' => 'nullable|string',
            ]);

            $tiket = JenisTiket::findOrFail($validated['id']);
            $tiket->update([
                'nama' => $validated['nama'],
                'harga' => $validated['harga'],
                'kuota' => $validated['kuota'],
                'deskripsi' => $validated['deskripsi'],
            ]);

            return response()->json([
                'status' => true,
                'message' => 'Jenis tiket berhasil diperbarui.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal. Periksa input Anda.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal memperbarui jenis tiket: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat memperbarui data. Silakan coba lagi.'
            ], 500);
        }
    }

    public function delete(Request $r)
    {
        try {
            $validated = $r->validate([
                'id' => 'required|exists:jenis_tikets,id'
            ]);

            $tiket = JenisTiket::findOrFail($validated['id']);
            $tiket->delete();

            return response()->json([
                'status' => true,
                'message' => 'Jenis tiket berhasil dihapus.'
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Validasi gagal. Pastikan data yang dikirim benar.',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            Log::error('Gagal menghapus jenis tiket: ' . $e->getMessage());

            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan saat menghapus data. Silakan coba lagi.',
            ], 500);
        }
    }
}
