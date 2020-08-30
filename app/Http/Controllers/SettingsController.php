<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $settingData = $request->all();
        Setting::create($settingData);
        return redirect()->back();
    }


    public function update(Request $request, $id)
    {
        $input = $request->all();
        $setting = Setting::findOrFail($id);
        $setting->update($input);
        return redirect()->back();
    }

    public function destroy($id)
    {
        Setting::findOrFail($id)->delete();
        return redirect()->back();
    }
}
