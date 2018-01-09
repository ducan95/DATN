<?php
namespace WebService\Service\Post;
use WebService\Repository\Post\PostRepository;
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
    try {
      $validator = Validator::make($request->all(), [
        'title' => 'required',
        'id_release_number' => 'required',
        'thumbnail_path' => 'required',
        'status_preview_top'=> 'required',
        'content ' => 'required',
        'status' => 'required'
      ],[
        'title.required'=> trans('validate.image_required'),
        'id_release_number.image'=> trans('validate.image_must_be_valid_image_address'),
        'thumbnail_path.max'=> trans('validate.maximum_image_size_is_320MB'),
        'status_preview_top' => trans('validate.name_exists'),
        'content' => trans('validate.name_exists'),
        'status' => trans('validate.name_exists')
      ]);

      if($validator ->fails()) { 
        $res['errors']['msg'] = $validator->errors();
        $res['errors']['status_code'] = 400; 
      } else {
        foreach ($request->all() as $key => $value) {
          $dataReq[$key] = $value;
        }
        if(isset($request->title)){
          $dataReq['slug'] = str_slug($request->title);
        }  

        $dataReq['is_deleted'] = 111;//str_slug($request->title);
        $dataReq['deleted_at'] = 11;//str_slug($request->title);
        $dataReq['id_user'] = 11;//str_slug($request->title);
        $res['data'] = PostRepository::getInstance()->save($dataReq); return $res;
      }
    } catch(\Exception $e) {
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

}