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
      return UserService::getInstance()->find($request);
    }

    public function actionFindOne($id)
    {   
      $result = UserService::getInstance()->findOne($id);
      return Api::response([
          'is_success' => $result['is_success'] ,
          'status_code' => $result['status_code'],
          'data' => $result['data'],
          'errors' => $result['errors'],    
      ]);  
    }

    public function actionSave(Request $request)
    {  
      $result = UserService::getInstance()->save($request);
      return Api::response([
          'is_success' => $result['is_success'] ,
          'status_code' => $result['status_code'],
          'data' => $result['data'],
          'errors' => $result['errors'],    
      ]); 
    }

    public function actionUpdate(Request $request, $id)
    {   
      $result =  UserService::getInstance()->update($request, $id); 
      return Api::response([
        'is_success' => $result['is_success'] ,
        'status_code' => $result['status_code'],
        'data' => $result['data'],
        'errors' => $result['errors'],    
      ]);
    }

    public function actionDelete($id)
    {   
        $result =  UserService::getInstance()->delete($id);
        return Api::response([
        'is_success' => $result['is_success'] ,
        'status_code' => $result['status_code'],
        'data' => $result['data'],
        'errors' => $result['errors'],    
      ]);

    }
}