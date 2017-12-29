<?php
namespace App\Http\Controllers\Api\src;
use WebService\Service\Category\CategoryService;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Extention\Api;
use App\Http\Controllers\Api\WebApiController as WebApiController; 


class CategoryController extends WebApiController
{
  public function actionList(){
    $res=CategoryService::getInstance()->list();
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
  public function actionListOne($id){
    $res = CategoryService::getInstance()->listOne($id); 

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
    $res = CategoryService::getInstance()->save($request);
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

  public function actionUpdate(Request $request,$id)
  {
    $res=CategoryService::getInstance()->update($request,$id);
    if(!isset($res['errors'])){
      return Api::response(([ 'data' => $res['data'] ]));
    }else{
      return Api::response(([
        'is_success' => false,
        'status_code' =>500,
        'errors' =>$res['errors']
      ]));
    }
  }

  public function actionUpdateChil(Request $request,$id)
  {
   $res=CategoryService::getInstance()->updatechil($request,$id);
    if(!isset($res['errors'])){
      return Api::response(([ 'data' => $res['data'] ]));
    }else{
      return Api::response(([
        'is_success' => false,
        'status_code' =>500,
        'errors' =>$res['errors']
      ]));
    } 
  }

  public function actionDelete($id)
  {
    $res =  CategoryService::getInstance()->delete($id);
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

  public function actionFind(Request $request){
    //Do something
  }

  public function actionFindOne($id){
    $res = CategoryService::getInstance()->findOne($id); 
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
  public function actionSaveChil(Request $request){
    $res=CategoryService::getInstance()->saveChil($request);
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