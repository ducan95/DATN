<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class CheckRoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $role_code = Auth::user()->role_code;
        $pos = strpos($role,$role_code);
        if($pos === false){
            return redirect('/admin/dasboard');
        }
        return $next($request);
    }
}
