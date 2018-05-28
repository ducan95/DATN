<?php
namespace WebService\Service\Post;
use Illuminate\Support\Facades\DB;
use WebService\Repository\Post\PostRepository;
use WebService\Repository\PostCategory\PostcategoryRepository;
use WebService\Service\Service;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
    // Log::info($res);exit;
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

  public function save($request){

  }

  /**
   * @param $post_data
   * @param $post_category_data
   * @return mixed
   */
  public function batchSave($post_data, $post_category_data)
  {	
      $validator = Validator::make($post_data, [
        'title'               => 'required',
        'thumbnail_path'      => 'required',
        'id_release_number'   => 'required',
        'time_begin'          => 'required',
        'time_end'            => 'required',
        'content'             => 'required'
      ],[
        'title.required'=> trans('validate.image_required'),
        'thumbnail_path.required'=> trans('validate.image_required'),
        'id_release_number.image'=> trans('validate.image_must_be_valid_image_address'),
        'thumbnail_path.max'=> trans('validate.maximum_image_size_is_320MB'),
        'content' => trans('validate.name_exists'),
        'time_begin.required' => trans('validate.image_required'),
        'time_end.required' => trans('validate.image_required'),
        'content.required' => trans('validate.image_required')
      ]);

      if($validator ->fails()) {
        //code debug không thỏa mản điều kiện validation
        //Log::info("bi lỗi validate rồi ");
        //Log::info($validator->errors());
       // exit;
        $res['errors']['msg'] = $validator->errors();
        $res['errors']['status_code'] = 400; 
      } else {
      try{
        //code debug thỏa mản điều kiện validation
        //Log::info("có vào đây không");exit;
        // khi tiến hành lưu dữ liệu mình sẽ sử dụng transaction để đảm bảo dữ liệu sẽ không lưu dư thừa hoặc update sai, xóa, ...

        // khởi tạo transaction ở đây
        DB::beginTransaction();
        // if(is_array($post_data) || is_object($post_data)){
          //sử dụng try catch ở đây nếu chạy hết thì commit transaction, throw ra lỗi thì rollback transaction
          try{
            foreach ($post_data as $key => $value) {
              $dataReq['post'][$key] = $value;
            }
            if(isset($post_data->title)){
              $dataReq['post']['slug'] = str_slug($post_data->title);
            }
            $dataReq['post']['id_user'] = Auth::user()->id_user;
            $res['data']= PostRepository::getInstance()->save($dataReq['post']);
            foreach ($post_category_data['id_category'] as $value) {
              $dataReq['post_category']['id_post'] =$res['data']->id_post;
              $dataReq['post_category']['id_category'] = $value;
              $res['post_category']=PostcategoryRepository::getInstance()->save($dataReq['post_category']); 
            }
            //chạy đến đây nếu ko gặp lỗi thì tiến hành commit transaction, chứng tỏ api đã hoạt động ok ko lỗi lầm gì
            DB::commit();
          }
          catch(\Exception $e){
            //nếu throw ra lỗi chứng tỏ bị lỗi  trong tiến trình gì đó nên phải rollback lại ko cho lưu những dữ liệu đã lưu trước đo
            DB::rollBack();
            throw $e;
          }
      }  
      catch(\Exception $e){
          $res['errors']['msg'] = $e->getMessage();
          $res['errors']['status_code'] = 500;
      } 
    }
      // Log::info($res['post_category']);exit;
      return $res;
    }
  public function update($request,$id){
    
  }
    
  public function batchupdate($post_data,$post_category_data, $id)
  {	
    try{
      //code debug thỏa mản điều kiện validation
      //Log::info("có vào đây không");exit;
      // khi tiến hành lưu dữ liệu mình sẽ sử dụng transaction để đảm bảo dữ liệu sẽ không lưu dư thừa hoặc update sai, xóa, ...

      // khởi tạo transaction ở đây
      DB::beginTransaction();
      // if(is_array($post_data) || is_object($post_data)){
        //sử dụng try catch ở đây nếu chạy hết thì commit transaction, throw ra lỗi thì rollback transaction
        try{
          foreach ($post_data as $key => $value) {
            $dataReq['post'][$key] = $value;
          }
          if(isset($post_data->title)){
            $dataReq['post']['slug'] = str_slug($post_data->title);
          }
          $dataReq['post']['id_user'] = Auth::user()->id_user;
          $res['data']= PostRepository::getInstance()->update($dataReq['post'],$id);
          foreach ($post_category_data['id_category'] as $value) {
            // $dataReq['post_category']['id_post'] =$id;
            $dataReq['post_category']['id_category'] = $value;
            $dataReq['post_category']['id_category_before']=$post_category_data['id_category_before'];
            $res['post_category']=PostcategoryRepository::getInstance()->update($dataReq['post_category'],$id); 
          }
          //chạy đến đây nếu ko gặp lỗi thì tiến hành commit transaction, chứng tỏ api đã hoạt động ok ko lỗi lầm gì
          DB::commit();
        }
        catch(\Exception $e){
          //nếu throw ra lỗi chứng tỏ bị lỗi  trong tiến trình gì đó nên phải rollback lại ko cho lưu những dữ liệu đã lưu trước đo
          DB::rollBack();
          throw $e;
        }
    }  
    catch(\Exception $e){
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
    } 
    // Log::info($res['post_category']);exit;
    return $res;
  }

  public function delete($id)
  {
    
  }
  public function list(){
    try{
      $res['data'] = PostRepository::getInstance()->list();
    } catch(\Exception $e){
      $res['errors'] = $e->getMessage();
    }
    return $res;
  }
  public function loadmorePost($offset, $row_count){
    $result = PostRepository::getInstance()->loadmorePost($offset, $row_count);
    try{
      if(!empty($result)){
        $res['data'] = $result;
      }
      else{
        throw new \Exception('No record');
      }
    } catch(\Exception $e){
      $res['errors'] =$e->getMessage();
    }
    return $res;
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
