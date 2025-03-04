<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    public function index(Request $request){
        $email = $request->session()->get('cmuitaccount');
        if(!empty($email)){
        $profile = User::where('email', $email)->first();
        return view( 'Users/index' )->with([
            'profile'=> $profile        
        ]);
        }
        return redirect('/login');

     }
    // set Email Test  By  pass  
  
}
