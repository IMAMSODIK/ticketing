<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWebSettingRequest;
use App\Http\Requests\UpdateWebSettingRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebSettingController extends Controller
{
    public function index()
    {
        $data = [
            'web_profile' => WebSetting::first(),
            'pageTitle' => "Profile Web",
        ];

        try {
            return view('setting.index', $data);
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function update(Request $r)
    {
        try {
            $data = WebSetting::firstOrFail();

            if ($r->hasFile('cover')) {
                if ($data->banner && Storage::exists('public/' . $data->banner)) {
                    Storage::delete('public/' . $data->banner);
                }
                $coverPath = $r->file('cover')->store('web_cover', 'public');
                $data->banner = $coverPath;
            }

            if ($r->hasFile('avatar')) {
                if ($data->logo && Storage::exists('public/' . $data->logo)) {
                    Storage::delete('public/' . $data->logo);
                }
                $avatarPath = $r->file('avatar')->store('web_avatar', 'public');
                $data->logo = $avatarPath;
            }

            $data->facebook = $r->facebook;
            $data->instagram = $r->instagram;
            $data->tiktok = $r->tiktok;
            $data->website = $r->website;

            $data->save();

            return response()->json([
                'status' => true,
                'message' => 'Berhasil memperbarui pengaturan website.'
            ]);
        } catch (Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ]);
        }
    }
}
