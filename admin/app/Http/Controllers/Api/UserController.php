<?php
namespace App\Http\Controllers\Api;
use WebService\Service\User\UserService;
use Illuminate\Http\Request;
use Extention\ApiRequest;
use Extention\Api;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:30
 */
class UserController extends \App\Http\Controllers\WebApiController
{   
    public function actionFind(Request $request)
    { 
      $res = UserService::getInstance()->find($request); 
      if(!isset($res['errors'])) {
        return Api::response([ 'data' => $res['data']]);
      }else {
        return Api::response([ 
          'is_success' => false,
          'status_code' => 404,
          'errors' => $res['errors']
        ]);
      }
    }

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

    public function actionSave(Request $request)
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

    public function actionUpdate(Request $request, $id)
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