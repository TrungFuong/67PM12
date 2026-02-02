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

    public function signin()
    {
        return view('auth.signin');
    }

    public function registerAction(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
        $confirmPassword = $request->input('password_confirmation');
        $mssv = $request->input('mssv');
        $lop_mon_hoc = $request->input('lop_mon_hoc');
        $gioi_tinh = $request->input('gioi_tinh');



        if ($password != $confirmPassword) {
            return "Đăng ký thất bại!";
        }
        if (
            $username === "Phương" &&
            $mssv === "025420" &&
            $lop_mon_hoc === "LT20IT" &&
            $gioi_tinh === "Nam"
        ){
            return "Đăng ký thành công!";
        } else {
            return "Đăng ký thất bại!";
        }
    }

    public function saveAge(Request $request)
    {
        $age = $request->input('age');
        if (!is_numeric($age) || $age < 0 || $age < 18) {
            return redirect()->back()->withErrors(['age' => 'Invalid age. You must be at least 18 years old.']);
        }
        session()->put('age', $age);
        return redirect('/product');
    }

    public function getAge(){
        return view('auth.ageValidation');
    }
}
