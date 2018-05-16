<?php

namespace App\Http\Controllers\WebClient\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use WebService\Service\Member\MemberService;
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
    session_start();
    $email    = trim($request->email);
    $password = trim($request->password);
    // $id_member='select id_member from members where email=$email';
    // dd($id_member);die();
    if(Auth::guard('member')->attempt(['email' => $email, 'password' => $password])){
      return redirect()->route('WebClientEndUserIndex');
    }
    else {
      return redirect()->back()->with('status', trans('validate.webClient.login_fail'));
    }
    
  }
 
     /**
      * action admincp/logout
      * @return RedirectResponse
      */
  public function getLogoutEndUser(){
    Auth::guard('member')->logout();
    return redirect()->route('getLoginEndUser');
  }
}
