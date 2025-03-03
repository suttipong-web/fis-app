<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutnController extends Controller
{
    //
    public function index()
    {
        return view("login");
    }
    public function checklogin(Request $request)
    {
        $Username = $request->username;
        $Password = $request->password;
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            if ($user->isAdmin) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'ข้อมูลเข้าสู่ระบบไม่ถูกต้อง',
        ]);

        //return view("login");
    }
}
