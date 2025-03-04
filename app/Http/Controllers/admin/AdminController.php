<?php

namespace App\Http\Controllers\admin;

use App\class\HelperService;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
 {

    public function index( Request $request ) {
        $class  = new HelperService();
        $email = $request->session()->get( 'cmuitaccount' );
        if ( !empty( $email ) ) {
            $profile = User::where( 'email', $email )->first();
            return view( 'Admin/index' )->with( [
                'profile'=> $profile ,
                'msg'=>   $class->testClass()
            ] );
        }
        return redirect( '/admin/login' );
    }
}
