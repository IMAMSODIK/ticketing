<?php

namespace App\Http\Controllers;

use App\Models\WebSetting;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWebSettingRequest;
use App\Http\Requests\UpdateWebSettingRequest;
use Exception;

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWebSettingRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(WebSetting $webSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WebSetting $webSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateWebSettingRequest $request, WebSetting $webSetting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WebSetting $webSetting)
    {
        //
    }
}
