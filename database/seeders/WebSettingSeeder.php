<?php

namespace Database\Seeders;

use App\Models\WebSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WebSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebSetting::create([
            'facebook' => 'https://www.facebook.com/?locale=id_ID',
            'instagram' => 'http://instagram.com/',
            'tiktok' => 'http://tiktok.com/',
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
