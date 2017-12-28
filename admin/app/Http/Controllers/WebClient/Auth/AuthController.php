<?php

namespace App\Http\Controllers\WebClient\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Client\LoginRequest;
use Illuminate\Support\Facades\Auth;
use App\Member;

class AuthController extends Controller
{
	public function getLogin(){
		return view('client.auth.index');
	}

 /**
  * @param LoginRequest $request
  * @return RedirectResponse
  */
 	public function postLogin(LoginRequest $request)
 	{
    $email    = trim($request->email);
    $password = trim($request->password);
    
	if (Auth::attempt(['email' => $email, 'password' => $password])) {
        // Authentication passed...
    return redirect()->route('WebClientEndUserIndex');

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
