<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // ให้ return เป็นจริงเมื่อเข้าสู่ระบบ
        if(auth()->check()) {
            return $next($request);
        }
        // เมื่อไม่ใช่ให้ทำการ logout ไป, session ยกเลิก, session regent, and redirect ไปที่ login 
        else{
            auth()->logout();
            session()->invalidate();
            session()->regenerateToken();
            return redirect('login')->with('message', __('auth,failed'));
            // ในการส่ง with message ให้ไปดูที่โฟล์เดอร์ lang fileชื่อ auth ที่key ที่ชื่อ failed ว่ามี value อะไร
        }
    }
}
