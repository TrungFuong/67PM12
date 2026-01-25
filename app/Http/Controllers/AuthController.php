<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function checkLogin(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');

        if ($username === 'trungfuong' && $password === '4123') {
            return 'ok';
        } else {
            return 'fail';
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function registerAction(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $confirmPassword = $request->input('password_confirmation');

        return "OK: Username - $username, Password - $password";
    }    
}
