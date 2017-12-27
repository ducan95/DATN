<?php

namespace App\Http\Controllers\Api\client;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use WebService\Service\Member\MemberService;
use Illuminate\Http\Request;
use App\Http\Requests\Client\RegisterMemberRequest;
use Extention\Api;

class MemberController extends Controller
{
    public function actionSave(Request $request)
  {
    $res = MemberService::getInstance()->save($request);
      if(!isset($res['errors'])) {
        return Api::response([ 'data' => $res['data']]);
      }else {
        return Api::response([ 
          'is_success' => false,
          'status_code' => 500,
          'errors' => $res['errors']
        ]);
      } 
  }
}
