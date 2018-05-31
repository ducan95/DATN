<?php
namespace App\Http\Controllers\Api\src;
use Illuminate\Support\Facades\Log;
use WebService\Service\Post\PostService;
use Illuminate\Http\Request;
use Extention\ApiRequest;
use Extention\Api;
use App\Http\Controllers\Api\WebApiController as WebApiController;

class PostController extends WebApiController
{ 
  /**
   * search user by keyword
   * create by An
   * Edit by Huynh
   * @param  Request $request
   * @return Response
  **/  
  public function actionFind( Request $request)
  { 
    $res = PostService::getInstance()->find($request);
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
   * create by An
   * Edit by Huynh
   * @param  id 
   * @return Response
   */ 
  public function actionFindOne($id)
  {   
    $res = PostService::getInstance()->findOne($id); 
    if(!isset($res['errors'])){
    	return Api::response(['data' => $res['data']]);
    }else{
    	return Api::response([
    	'is_success' =>false,
    	'status_code' =>$res['errors']['status_code'],
    	'errors'      =>$res['errors']['msg']
    	]);
    }
  }
  /**
   * create new user 
   *
   * @param  Request $request
   * @return Response
   */ 
  public function actionSave(Request $request)
  {
    $post_data=$request["data"]["post"];
    $post_category_data= $request["data"]["post_category"];
    if(empty($post_data) || empty($post_category_data)){
      return Api::response([
        'is_success' => false,
        'status_code' => 400,
        'errors' => "loi empty o day"
      ]);
      }

    $res = PostService::getInstance()->batchSave($post_data, $post_category_data);
    // Log::info($res);
    // exit;
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
  public function actionUpdate1(Request $request,$id){
    $res = PostService::getInstance()->update1($request,$id); 
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
   * update user 
   *
   * @param  Request $request
   * @param  $id
   * @return Response
   */
  public function actionUpdate(Request $request, $id)
  {  
    // Log::info($request);
    // exit;
    $post_data=$request["data"]["post"];
    $post_category_data= $request["data"]["post_category"];
    if(empty($post_data) || empty($post_category_data)){
      return Api::response([
        'is_success' => false,
        'status_code' => 400,
        'errors' => "loi empty o day"
      ]);
      }
      $res = PostService::getInstance()->batchupdate($post_data, $post_category_data,$id);
      // Log::info($res);
      // exit;
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

  

  public function actionDelete($id)
  {   
    $res =  PostService::getInstance()->delete($id);
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