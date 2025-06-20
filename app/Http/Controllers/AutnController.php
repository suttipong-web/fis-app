<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutnController extends Controller
{
    //
    public function index()
    {
        return view("login");
    }
    public function login()
    {
        return view("login");
    }
    

    public function checklogin(Request $request)
    {
        $request->validate([
            'username' => 'required|email',
            'password' => 'required',
        ]);

        
        $Username = $request->username;
        $Password = md5($request->password);


        $user =User::where('email', $Username)->where('password', $Password)->first();
        if($user) {
            if ($user->isAdmin) {
             //   return redirect()->route('admin.dashboard');
            } else {
            //    return redirect()->route('user.dashboard');
            }

        }





        
        return back()->withErrors([
            'email' => 'ข้อมูลเข้าสู่ระบบไม่ถูกต้อง',
        ]);

        //return view("login");
    }
}
