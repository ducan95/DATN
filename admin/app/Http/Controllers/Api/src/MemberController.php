<?php
namespace App\Http\Controllers\Api\src;
use WebService\Service\Member\MemberService;
use Illuminate\Http\Request;
use Extention\ApiRequest;
use Extention\Api;
use App\Http\Controllers\Api\WebApiController as WebApiController; 
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:30
 */
class MemberController extends WebApiController
{ 
  /**
   * search user by keyword
   *
   * @param  Request $request
   * @return Response
   */  
  public function actionFind(Request $request)
  { 
    $res = MemberService::getInstance()->find($request); 
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

  public function actionSave(Request $request)
  {  
    $res = MemberService::getInstance()->save($request);
    if(!isset($res['errors'])){
      return Api::response(['data' => $res['data']]);
    }else {
      return Api::response([ 
        'is_success' => false,
        'status_code' => $res['errors']['status_code'],
        'errors' => $res['errors']['msg'],
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
    $res = MemberService::getInstance()->findOne($id); 

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
   * @param  Request $request
   * @return Response
   */ 
  

  /**
   * update user 
   *
   * @param  Request $request
   * @param  $id
   * @return Response
   */
  public function actionUpdate(Request $request, $id)
  {   
    $res = MemberService::getInstance()->update($request, $id);
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
   * delete user 
   *
   * @param  $id
   * @return Response
   */

  public function actionDelete($id)
  {    
    $res =  MemberService::getInstance()->delete($id); 
    if(!isset($res['errors'])) {
      return Api::response([ 'data' => $res['data'], 'status_code' => 204]);
    }else {
      return Api::response([ 
        'is_success'  => false,
        'status_code' => $res['errors']['status_code'],
        'errors'      => $res['errors']['msg']
      ]);
    } 
  }
}