<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\User;
use App\Providers\AppServiceProvider;

class CheckUser extends AppServiceProvider
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public $permission=null;
    public function handle($request, Closure $next)
    {
        if(Auth::check()){
            $user=Auth::user();
            if($user ->role_code == 's_admin'){
                return $this ->$permission = 's_admin';
            }
            if($user ->role_code == 'admin'){
                return $this ->$permission = 'admin';
            }
            if($user ->role_code == 'editor'){
                return $this ->$permission = 'editor';
            }
            if($user ->role_code == 'user'){
                return $this ->$permission = 'user';
            }
        }
    }    
    public function boot()
    {
        View::share('key',$this ->$permission );
    }     
}
        
        
