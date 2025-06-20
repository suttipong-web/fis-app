<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
 {
    /**
    * Handle an incoming request.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  \Closure( \Illuminate\Http\Request ): ( \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse )  $next
    * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
    */

    public function handle( Request $request, Closure $next )
 {
        if($request->session()->has( 'cmuitaccount' ) ) {
            if ( empty( $request->session()->has( 'isAdmin' ) ) ) {
                return redirect( '/' )->with( 'message', 'กรุณาเข้าสู่ระบบใหม่' );
            }
        } else {
            return redirect( '/' )->with( 'message', 'กรุณาเข้าสู่ระบบใหม่' );
        }
        return $next( $request );
    }
}
