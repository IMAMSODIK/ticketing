<?php

namespace Database\Seeders;

use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now();

        DB::table('events')->insert([
            [
                'id' => Str::uuid(),
                'thumbnail' => null,
                'title' => 'Sahabat Bertamu Jakarta',
                'tanggal_mulai' => '2025-08-01',
                'tanggal_selesai' => '2025-08-01',
                'waktu_mulai' => '09:00:00',
                'waktu_selesai' => '12:00:00',
                'kota_id' => 1,
                'nama_tempat' => 'Masjid Istiqlal',
                'alamat' => 'Jl. Taman Wijaya Kusuma, Jakarta Pusat',
                'deskripsi' => 'Acara silaturahmi dan kajian bersama komunitas Sahabat Bertamu.',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'thumbnail' => null,
                'title' => 'Sahabat Bertamu Bandung',
                'tanggal_mulai' => '2025-08-10',
                'tanggal_selesai' => '2025-08-10',
                'waktu_mulai' => '10:00:00',
                'waktu_selesai' => '13:00:00',
                'kota_id' => 2,
                'nama_tempat' => 'Gedung Dakwah',
                'alamat' => 'Jl. Soekarno Hatta No. 100, Bandung',
                'deskripsi' => 'Kajian dan diskusi bertema ukhuwah Islamiyah.',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'thumbnail' => null,
                'title' => 'Sahabat Bertamu Yogyakarta',
                'tanggal_mulai' => '2025-08-20',
                'tanggal_selesai' => '2025-08-20',
                'waktu_mulai' => '15:00:00',
                'waktu_selesai' => '18:00:00',
                'kota_id' => 3,
                'nama_tempat' => 'Alun-alun Kidul',
                'alamat' => 'Jl. Alun-Alun Kidul, Yogyakarta',
                'deskripsi' => 'Ngaji santai dan berbagi pengalaman spiritual.',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'thumbnail' => null,
                'title' => 'Sahabat Bertamu Surabaya',
                'tanggal_mulai' => '2025-09-01',
                'tanggal_selesai' => '2025-09-01',
                'waktu_mulai' => '08:00:00',
                'waktu_selesai' => '11:00:00',
                'kota_id' => 4,
                'nama_tempat' => 'Masjid Al Akbar',
                'alamat' => 'Jl. Masjid Al Akbar, Surabaya',
                'deskripsi' => 'Tabligh akbar dan buka bersama komunitas Sahabat Bertamu.',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'id' => Str::uuid(),
                'thumbnail' => null,
                'title' => 'Sahabat Bertamu Semarang',
                'tanggal_mulai' => '2025-09-10',
                'tanggal_selesai' => '2025-09-10',
                'waktu_mulai' => '13:00:00',
                'waktu_selesai' => '16:00:00',
                'kota_id' => 5,
                'nama_tempat' => 'Kawasan Simpang Lima',
                'alamat' => 'Jl. Pahlawan, Semarang',
                'deskripsi' => 'Talkshow bersama ustadz nasional dalam suasana kebersamaan.',
                'created_by' => 1,
                'updated_by' => 1,
                'status' => 'Aktif',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
