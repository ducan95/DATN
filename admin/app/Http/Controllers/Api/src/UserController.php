<?php
namespace App\Http\Controllers\Api\src;
use WebService\Service\User\UserService;
use Illuminate\Http\Request;
use Extention\ApiRequest;
use Extention\Api;
use App\Http\Requests\UserActionUpdateRequest;
use App\Http\Requests\UserActionSaveRequest;
use App\Http\Controllers\Api\WebApiController as WebApiController; 

class UserController extends WebApiController
{ 
  /**
   * search user by keyword
   *
   * @param  Request $request
   * @return Response
   */
  public function actionFind(Request $request)
  { 
    $res = UserService::getInstance()->find($request); 
    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data']]);
    }else {
      return Api::response([ 
        'is_success' => false,
        'status_code' => $res['errors']['status_code'],
        'errors' => $res['errors']['msg']
      ]);
    }
  }

  /**
   * search user by id
   *
   * @param  Request $request
   * @return Response
   */ 
  public function actionFindOne($id)
  {   
    $res = UserService::getInstance()->findOne($id); 

    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data']]);
    }else {
      return Api::response([ 
        'is_success' => false,
        'status_code' => $res['errors']['status_code'],
        'errors' => $res['errors']['msg']
      ]);
    }
  }
  /**
   * create new user 
   *
   * @param  UserActionSaveRequest $request
   * @return Response
   */ 
  public function actionSave(UserActionSaveRequest $request)
  {  
    $res = UserService::getInstance()->save($request); 
    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data']]);
    }else {
      return Api::response([ 
        'is_success' => false,
        'status_code' => $res['errors']['status_code'],
        'errors' => $res['errors']['msg']
      ]);
    } 
  }

  /**
   * update user 
   *
   * @param  UserActionUpdateRequest $request
   * @param  $id
   * @return Response
   */
  public function actionUpdate(UserActionUpdateRequest $request, $id)
  {   
    $res =  UserService::getInstance()->update($request, $id); 
    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data']]);
    }else {
      return Api::response([ 
        'is_success' => false,
        'status_code' => $res['errors']['status_code'],
        'errors' => $res['errors']['msg']
      ]);
    } 
  }

  /**
   * delete user 
   *
   * @param  $id
   * @return Response
   */

  public function actionDelete($id)
  {   
    $res =  UserService::getInstance()->delete($id);
    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data'], 'status_code' => 204]);
    }else {
      return Api::response([ 
        'is_success' => false,
        'status_code' => $res['errors']['status_code'],
        'errors' => $res['errors']['msg']
      ]);
    } 
  }
}