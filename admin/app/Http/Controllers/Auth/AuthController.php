<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// Use loginRequest
use App\Http\Controllers\Requests\LoginRequest;
use Auth;
use App\User;

class AuthController extends Controller
{

     public function getLogin()
     {
         if (Auth::check()) {
             // nếu đăng nhập thàng công thì 
             return redirect('/');
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
         $login = [
             'email'    => $request->txtEmail,
             'password' => $request->txtPassword,
             'id_role'  => 1,
             'status'   => 1
         ];
         if (Auth::attempt($login)) {
             return redirect('admincp');
         } else {
             return redirect()->back()->with('status', 'Email hoặc Password không chính xác');
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
