<?php

namespace App\Http\Controllers;

use App\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DevicesController extends Controller
{

    public function index()
    {
//        $devicesData = Device::all();
//        return view('index', compact('devicesData'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $deviceData = $request->all();
        Device::create($deviceData);
        return redirect()->back();
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $device = Device::findOrFail($id);
        $device->update($input);
        return redirect()->back();

    }

    public function destroy($id)
    {
        $device = Device::findOrFail($id)->delete();
        return redirect()->back();
    }


    public function removeUser($id)
    {
        dd('Function Not Completed');

    }


}
