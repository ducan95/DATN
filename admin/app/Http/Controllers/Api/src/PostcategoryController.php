<?php
namespace App\Http\Controllers\Api\src;
use WebService\Service\Postcategory\PostcategoryService;
use Illuminate\Http\Request;
use Extention\ApiRequest;
use Extention\Api;
use App\Http\Controllers\Api\WebApiController as WebApiController; 

class PostcategoryController extends WebApiController
{ 
   public function actionSave(Request $request){
   	 $res = PostcategoryService::getInstance()->save($request); 
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
  public function actionUpdate(Request $request, $id){

  }
  public function actionDelete($id){

  }
  public function actionFind(Request $request){

  }
  public function actionFindOne($id){

  }
}