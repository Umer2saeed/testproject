<?php

namespace App\Http\Controllers;

use App\Device;
use App\Setting;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index() {

        $devicesData = Device::all();
        $usersData = User::all();
        $users = User::pluck('firstname', 'id')->all();
        $settingsData = Setting::all();

        $takenUsers = [];
        $availableUsers = [];
        for ($i=0; $i<$usersData->count(); $i++)
        {
            for ($j=0; $j<$devicesData->count(); $j++)
            {
                if ($usersData[$i]->id == $devicesData[$j]->user_id) {
                    $takenUsers[] = $usersData[$i];
                }

            }
        }




        for ($i=0; $i<$usersData->count(); $i++) {
            if (!in_array($usersData[$i], $takenUsers)){
                $availableUsers[] = $usersData[$i];
//                echo $usersData[$i]->firstname;
            }

        }
//            dd($availableUsers);








        return view('index', compact('devicesData', 'usersData', 'settingsData', 'users', 'takenUsers', 'availableUsers'));
    }



    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        dd('this is home controller');
    }
}
