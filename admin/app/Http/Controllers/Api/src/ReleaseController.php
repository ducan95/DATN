<?php

namespace App\Http\Controllers\Api\src;

use Extention\Api;
use Extention\ApiRequest;
use Illuminate\Http\Request;
use WebService\Service\Release\ReleaseService;
use App\Http\Requests\ReleaseActionUpdateRequest;
use App\Http\Requests\ReleaseActionSaveRequest;
use App\Http\Controllers\Api\WebApiController as WebApiController; 


class ReleaseController extends WebApiController
{
  /**
   * [Release Number]
   * @param  Request $request [description]
   * @return [type]           [description]
   */
	public function actionFind(Request $request)
  { 
    $res = ReleaseService::getInstance()->find($request); 
    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data']]);
    } else {
      return Api::response([ 
        'is_success'  => false,
        'status_code' => $res['errors']['status_code'],
        'errors'      => $res['errors']['msg']
      ]);
    }
  }

  /**
   * [actionFindOne description]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function actionFindOne($id)
  {   
  	$res = ReleaseService::getInstance()->findOne($id); 

    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data']]);
    }else {
      return Api::response([ 
        'is_success'  => false,
        'status_code' => $res['errors']['status_code'],
        'errors'      => $res['errors']['msg']
      ]);
    }
  }

  /**
   * [Add new Release number]
   * @param  Request $request [description]
   * @return [Obj]           [$res data]
   */
  public function actionSave(ReleaseActionSaveRequest $request)
  {  
  	$res = ReleaseService::getInstance()->save($request); 
    if(!isset($res['errors'])) {
      return Api::response(['data' => $res['data'] ])   ;
    } else {
      return Api::response([
        'is_success'  => false,
        'errors'      => $res['errors']['msg'],
        'status_code' => $res['errors']['status_code'],
      ]);
    }
  }

  /**
   * [actionUpdate description]
   * @param  Request $request [description]
   * @param  [type]  $id      [description]
   * @return [type]           [description]
   */
  public function actionUpdate(\App\Http\Requests\ReleaseActionUpdateRequest $request, $id)
  {   
    $res = ReleaseService::getInstance()->update($request, $id); 
    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data']]);
    } else {
      return Api::response([ 
        'is_success' => false,
        'status_code' => $res['errors']['status_code'],
        'errors' => $res['errors']['msg']
      ]);
    } 
  }

  /**
   * [Delete release number]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function actionDelete($id)
  {   
    $res = ReleaseService::getInstance()->delete($id);
    if (!isset($res['errors'])) {
      return Api::response([
        'data'        => $res['data'],
        'status_code' => 204
      ]);
    } else {
      return Api::response([
        'is_success'  => false,
        'status_code' => $res['errors']['status_code'],
        'errors'      => $res['errors']['msg']
      ]);
    }
  }

}
