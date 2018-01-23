<?php
namespace WebService\Service\Post;
use WebService\Repository\Post\PostRepository;
use WebService\Repository\PostCategory\PostcategoryRepository;
use WebService\Service\Service;
use Validator;
use Illuminate\Support\Facades\Auth;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class PostService extends Service
{

	public function find($request){
		try {
      $dataReq = [];
      $dataQueries = ['releaseNumber', 'categoryParent', 'categoryChildren', 'status', 'username' ];
      foreach ($dataQueries as $dataQuery) {
        if(!empty($request->query($dataQuery)) ) {
          $dataReq[$dataQuery] = $request->query($dataQuery);
        }
      } 
      $res['data'] = PostRepository::getInstance()->find($dataReq); 
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
	}
   	
 	public function findOne($id)
  {	
  	try{
  		$res['data']=PostRepository::getInstance()->findOne($id); 
  	}catch(\Exception $e){
  		$res['errors']['msg']=$e ->getMessage();
  		$res['errors']['status_code']=500;
  	}	
  	return $res;
  }

  public function save($request)
  {	
    return request;
    try{
      $data = $request->data;return $data['post'];
      $validator = Validator::make($data['post'], [
        'title'               => 'required',
        'thumbnail_path'      => 'required',
        'id_release_number'   => 'required',
        'time_begin'          => 'required',
        'time_end'            => 'required',
        'status_preview_top ' => 'required',
        'content'             => 'required',
        'status'              => 'required'
      ],[
        'title.required'=> trans('validate.image_required'),
        'thumbnail_path.required'=> trans('validate.image_required'),
        'id_release_number.image'=> trans('validate.image_must_be_valid_image_address'),
        'thumbnail_path.max'=> trans('validate.maximum_image_size_is_320MB'),
        'status_preview_top' => trans('validate.name_exists'),
        'content' => trans('validate.name_exists'),
        'status' => trans('validate.name_exists'),
        'time_begin.required' => trans('validate.image_required'),
        'time_end.required' => trans('validate.image_required'),
        'status_preview_top.required' => trans('validate.name_exists'),
        'content.required' => trans('validate.image_required'),
        'status.required' => trans('validate.image_required')
      ]);

      if($validator ->fails()) { 
        $res['errors']['msg'] = $validator->errors();
        $res['errors']['status_code'] = 400; 
      } else { 
        if(is_array($data['post']) || is_object($data['post'])){
          foreach ($data['post'] as $key => $value) {
            $dataReq['post'][$key] = $value;
          }
          if(isset($data['post']->title)){
            $dataReq['post']['slug'] = str_slug($data['post']->title);
          }  
          $dataReq['post']['is_deleted'] = false;
          $dataReq['post']['deleted_at'] = null;
          $dataReq['post']['id_user'] = Auth::user()->id_user;
          if(isset($dataReq['post_category'])) {
            $dataReq['post_category']=$data['post_category'];
          }
          $res['data']= PostRepository::getInstance()->save($dataReq['post']);
          foreach ($dataReq['post_category'] as $value) {
            $dataReq['post_category']['id_post'] =  $res['data']->id_post;
            $dataReq['post_category']['id_category'] = $value;
            $dataReq['post_category']['is_deleted'] =false;
            $res['post_category']=PostcategoryRepository::getInstance()->save($dataReq['post_category']);
        }
      }
    }
    } 
    catch(\Exception $e){
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
    } 
  return $res;
}

  public function update($request, $id)
  {   
    try{
      $res['data']=PostRepository::getInstance()->update($request,$id);
    }catch(\Exception $e){
      $res['errors']= $e ->getMessage();
    }
    return $res;
	}

  public function delete($id)
  {
    
  }


  public function listOne($id){
    $result= PostRepository::getInstance()->listOne($id);
      try{
        if(!empty($result)){
        $res['data'] = $result;
      }
      else{
        throw new \Exception('No Record');
      }
      }catch(\Exception $e) {
        $res['errors'] = $e->getMessage();
      }
      return $res;
  }

  public function takeCatFirst($id){
    $result= PostRepository::getInstance()->takeCatFirst($id);
      try{
        if(!empty($result)){
        $res['data'] = $result;
      }
      else{
        throw new \Exception('No Record');
      }
      }catch(\Exception $e) {
        $res['errors'] = $e->getMessage();
      }
      return $res;
  }
}
