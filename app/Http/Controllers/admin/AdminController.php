<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
 {

    public function index( Request $request ) {
        $email = $request->session()->get( 'cmuitaccount' );
        if ( !empty( $email ) ) {
            $profile = User::where( 'email', $email )->first();
            return view( 'Admin/index' )->with( [
                'profile'=> $profile
            ] );
        }
        return redirect( '/admin/login' );
    }
}
