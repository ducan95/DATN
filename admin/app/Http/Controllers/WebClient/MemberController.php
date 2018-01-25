<?php

namespace App\Http\Controllers\WebClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use WebService\Service\Member\MemberService;
use App\Http\Requests\Client\RegisterMemberRequest;
use Extention\Api;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    public function index(){
    	return view('client.member.index');
    }

    public function changeEmail(){
      return view('client.member.changeEmail');
    }

    public function confirmEmail(Request $request){
      $emailChanged = MemberService::getInstance()->confirmEmail($request);
      if(isset($emailChanged['data'])){
        $emailConfirmed = $emailChanged['data'];
        return view('client.member.confirmEmail', compact('emailConfirmed'));
      } else{
        $error = isset($emailChanged['errors']['email'])? $emailChanged['errors']['email'] : '';
        return redirect()->route('webClientMemberChangeEmail')->with('error', $error);
      }      
    }

    public function acceptChangeEmail(Request $request, $id){
      $res = MemberService::getInstance()->changeEmailPass($request,$id);
      return redirect()->route('webClientMemberChangeEmailSuccess')->with('msg_change_email',trans('validate.webClient.msg_change_email'));
    }

    public function changeEmailSuccess(){
      return view('client.member.acceptChangeEmail');
    }

    public function getChangePassword($id){
      return view('client.member.changePassword');
    }

    public function postChangePassword(Request $request,$id){
      $res   = MemberService::getInstance()->getPass($request,$id);
      if(isset($res['data'])){
        return redirect()->route('webClientMemberChangeEmailSuccess')->with('msg_change_pass',trans('validate.webClient.msg_change_pass'));
      }else{
        $pass = isset($res['errors']['pass'])? $res['errors']['pass'] : '';
        $oldPass = isset($res['errors']['oldPass'])? $res['errors']['oldPass'] : '';
        $newPass = isset($res['errors']['newPass'])? $res['errors']['newPass'] : '';
        return view('client.member.changePassword', compact('pass','oldPass','oldPass'));
      }
    }

    public function save(Request $request){
    	$res = MemberService::getInstance()->save($request); 
    	if(isset($res['data'])){
    		$request->session()->flash('status_success',trans('validate.webClient.register_success'));
      } else{
    		$request->session()->flash('status_fail',trans('validate.webClient.register_fail'));
    	}
      return redirect()->route('webClientMemberIndex');
    }
}
