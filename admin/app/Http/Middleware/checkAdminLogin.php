<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\User;

class checkAdminLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::check()) 
        {
            $user = Auth::user(); 

            if ( $user->status == true )
            {
                return $next($request);
            }
            else
            {
                Auth::logout();
                return redirect()->route('getLogin');
            }
        } else {
            return redirect('/');
        } 

    }
}
