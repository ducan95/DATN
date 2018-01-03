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
      $dataQueries = ['title', 'releaseNumber', 'categoryParent', 'categoryChildren', 'status', 'username', 'password', 'time_begin', 'paginate' ];
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
    try{
        $res['data'] = PostRepository::getInstance()->save($request);
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