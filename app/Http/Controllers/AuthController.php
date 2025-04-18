<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function tampilRegister()
    {
        return view('register');
    }

    function submitRegistrasi(Request $request)
    {
        // $request->validate([
        //     'username' => 'required|unique:users',
        //     'password' => 'required|min:6',
        // ]);

        $user = new \App\Models\User();
        $user->username = $request->username;
        $user->password = bcrypt($request->password);
        $user->save();

        // dd($user);
        return redirect()->route('login')->with('success', 'Registrasi berhasil, silakan login.');
    }


    function tampilLogin()
    {
        return view('login');
    }

    function submitLogin(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return redirect()->back()->with('error', 'Username atau password salah.');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
