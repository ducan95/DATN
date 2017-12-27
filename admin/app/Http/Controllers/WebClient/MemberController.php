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
    		$request->session()->flash('status','You have successfully registered.');
      } else{
    		$request->session()->flash('status','Fail.');
    	}
      return redirect()->route('webClientMemberIndex');
    }
}
