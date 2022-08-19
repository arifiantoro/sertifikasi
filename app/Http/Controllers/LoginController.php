<?php

namespace App\Http\Controllers;

use Auth;
use Https\Models\Admin;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function halamanlogin()
    {
        return view('/auth/login');
    }

    public function postlogin(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return view('/');
        }
        return redirect('/');
    }

    public function registrasi()
    {
        return view('login.registrasi');
    }

    public function simpanregistrasi(Request $request)
    {
        // dd($request->all());

        $admin = [
            'id' => $request->id,
            'name' =>  $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ];

        return redirect('/auth/login');
    }
}
