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
      if(!isset($res['errors'])) {
        Api::response([ 'data' => $res['data']]);
        return redirect()->route('webClientMemberIndex')->with('status', 'Đăng ký thành công');
      }else {
        return Api::response([ 
          'is_success' => false,
          'status_code' => 500,
          'errors' => $res['errors'],
        ]);
      }
    }
}
