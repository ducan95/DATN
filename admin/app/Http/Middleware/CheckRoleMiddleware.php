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
            echo "Không có quyền nhé bé :D";
            return redirect('/admin');
        }
        return $next($request);
    }
    public function terminate($request, $response)
    {
        echo '<br>3. Terminable Middleware';
        echo '<br>Thực hiện sau khi HTTP response gửi đến trình duyệt';
    }
}
