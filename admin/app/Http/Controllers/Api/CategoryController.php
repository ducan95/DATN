<?php
namespace App\Http\Controllers\Api;
use WebService\Service\Category\CategoryService;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;
use Extention\Api;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 14/12/2017
 * Time: 10:30
 */
class CategoryController extends \App\Http\Controllers\WebApiController
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

  public function actionDelete()
  {
    // TODO: Implement actionDelete() method.
  }
  public function actionFind($request)
  {
    //
  }
  public function actionFindOne($id){
    //
  }
}