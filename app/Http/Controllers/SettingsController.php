<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingsController extends Controller
{
    public function edit($id){
        $setting = Setting::find(1);

        return response()->json([
            'setting' => $setting
        ]);
    }

    public function update(Request $request, $id){
        $setting = Setting::find(1);
        $setting->update(request()->all());

        return response()->json([
            'setting' => $setting
        ]);
    }

}
