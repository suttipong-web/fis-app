<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AutnController extends Controller
{
    //
        public function index() {
            return view("login");
        }
        public function checklogin(Request $request) {

            $Username = $request->username;
            $Password = $request->password;
            
            $credentials = $request->validate([
                'email' => ['required', 'email'],
                'password' => ['required'],
            ]);
            

            return view("login");
        }
}
