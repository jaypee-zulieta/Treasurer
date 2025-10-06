<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function show()
    {
        return view('users.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "username" => "string|required",
            "password" => "string|required"
        ]);

        if(Auth::attempt($credentials))
        {
            $request->session()->regenerate();
            return to_route('deposits.index');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.'
        ])->onlyInput('username');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return to_route('login');
    }
}
