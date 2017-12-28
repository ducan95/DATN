<?php

namespace App\Http\Controllers\Api\src;

use Extention\Api;
use Extention\ApiRequest;
use Illuminate\Http\Request;
use WebService\Service\Release\ReleaseService;
use App\Http\Controllers\Api\WebApiController as WebApiController; 


class ReleaseController extends WebApiController
{
  
	public function actionFind(Request $request)
  { 
    $res = ReleaseService::getInstance()->find($request); 
    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data']]);
    }else {
      return Api::response([ 
        'is_success'  => false,
        'status_code' => $res['errors']['status_code'],
        'errors' 			=> $res['errors']['msg']
      ]);
    }
  }

  public function actionFindOne($id)
  {   
  	//Code
  }

  public function actionSave(Request $request)
  {  
  	//Code
  }

  public function actionUpdate(Request $request, $id)
  {   
   //Code
  }

  public function actionDelete($id)
  {   
    //Code
  }

}
