<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {

      


        // if(auth()->guard()->check() && auth()->guard()->user()->role_id == 1) {
        //     return view('home');
        // }
        // else if(auth()->guard()->check() && auth()->guard()->user()->role_id == 2) {
        //     return view('subadmin');
        // }
        // else
        // {
        //     return view('auth.login');
        // }

        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
