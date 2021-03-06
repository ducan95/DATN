<?php
namespace App\Http\Controllers\Api\src;
use Illuminate\Support\Facades\Log;
use WebService\Service\Post\PostService;
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
    //code debug xem giá trị $request
    //Log::info($request["data"]["post"]);exit;
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

  /**
   * update user 
   *
   * @param  Request $request
   * @param  $id
   * @return Response
   */
  public function actionUpdate(Request $request, $id)
  {   
    $res=PostService::getInstance()->update($request,$id);
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

  /**
   * delete user 
   *
   * @param  $id
   * @return Response
   */

  public function actionDelete($id)
  {   
    
  }
}