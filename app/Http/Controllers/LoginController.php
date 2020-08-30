<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function signIn(Request $request) {
        $username = $request->username;
        $password = $request->password;
        $randomPassword = $request->randompassword;

        if(($username == 'admin' || $username == 'Admin') && $password == $randomPassword) {
            return redirect()->route('index');
        }

        return redirect('/login');

    }
}
