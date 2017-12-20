<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\User;

class AuthController extends Controller
{

     public function getLogin()
     {
         if (Auth::check()) {
            return redirect()->route('getIndex');  
         } else {
            return view('auth.login');           
         }
         
     }
 
     /**
      * @param LoginRequest $request
      * @return RedirectResponse
      */
     public function postLogin(LoginRequest $request)
     {
        $email    = trim($request->txtEmail);
        $password = trim($request->txtPassword);
        
		if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Authentication passed...
            return redirect()->route('getIndex');

        } else {
             return redirect()->back()->with('status', 'メールアドレスまたはパスワードが間違っています。');
         }
     }
 
     /**
      * action admincp/logout
      * @return RedirectResponse
      */
     public function getLogout()
     {
         Auth::logout();
         return redirect()->route('getLogin');
     }
}



 /* $login = [
    'email'    => $request->txtEmail,
    'password' => $request->txtPassword,
    'id_role'  => 1,
    'status'   => 1
];
//dd($login);
if (Auth::attempt($login)) {
    return redirect('admincp');
}  */