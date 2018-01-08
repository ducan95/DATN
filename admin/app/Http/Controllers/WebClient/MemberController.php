<?php

namespace App\Http\Controllers\WebClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use WebService\Service\Member\MemberService;
use App\Http\Requests\Client\RegisterMemberRequest;
use Extention\Api;
class MemberController extends Controller
{
    public function index(){
    	return view('client.member.index');
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
