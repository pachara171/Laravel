<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// เมื่อจะใช้งาน function auth
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLogin() {
        return view('login');
    }

    public function checklogin(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // เช็คว่าถ้าผ่านให้ทำการ regenerate
        //attemp ตัวนี้จะทำการตรวจสอบว่า email กับ password ที่ป้อมมาถูกไหม ถ้าถูกให้ทำอะไรต่อ
        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/content');
        }

        return back()->withErrors([
            'email' => 'Credentials do not mach our'
        ]);
    }

    public function logout() {
        auth()->logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect('login');
    }
}
