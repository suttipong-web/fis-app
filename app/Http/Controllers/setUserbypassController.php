<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class setUserbypassController extends Controller
{
    public function setUserbypass (Request $request) {
        if (!empty($request->email)) {
            $profile = User::where('email', $request->email)->first();
      
            if ($profile) {
                //  หน่วยงาน
                $getDepN = DB::table('department')
                ->select('dep_name')
                ->where('dep_id',$profile["dep_id"])           
                ->get();                
                $fullname = $profile["firstname_TH"] . ' ' . $profile["lastname_TH"];
                $request->session()->put('cmuitaccount', $profile["email"]);
                $request->session()->put('userfullname', $fullname);
                $request->session()->put('dep_id', $profile["dep_id"]);
                $request->session()->put('dep_name',$getDepN[0]->dep_name);
                $request->session()->put('last_activity', Carbon::now());
                $request->session()->put('positionName', $profile["positionName"]);
                $request->session()->put('positionName2', $profile["positionName2"]);  
                $request->session()->put('user_type', $profile["user_type"]);
                $request->session()->put('isAdmin',$profile["isAdmin"]);
                if($profile["user_type"]=="admin"){          
                    return redirect()->intended('/admin')->with('success', 'Login Successfull');                    
                }else {                   
                    return redirect()->intended('/users')->with('success', 'Login Successfull');
                }               
            }
            return redirect()->intended('/login')->with('error', 'Login failed');
        }
    }
}
