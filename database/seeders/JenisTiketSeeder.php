<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisTiketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jenis_tikets')->insert([
            [
                'nama' => 'Tiket Reguler',
                'harga' => 50000.00,
                'kuota' => 100,
                'deskripsi' => 'Tiket untuk peserta umum.',
            ],
            [
                'nama' => 'Tiket VIP',
                'harga' => 150000.00,
                'kuota' => 50,
                'deskripsi' => 'Tiket VIP dengan fasilitas tambahan.',
            ],
            [
                'nama' => 'Tiket Pelajar',
                'harga' => 30000.00,
                'kuota' => 200,
                'deskripsi' => 'Tiket khusus untuk pelajar atau mahasiswa.',
            ],
        ]);
    }
}
