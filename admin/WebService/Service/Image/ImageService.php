<?php
namespace WebService\Service\Image;
use WebService\Repository\Image\ImageRepository;
use WebService\Service\Service;
use Validator;
/**
 * Created by SublimeText.
 * User: Huynh
 * Date: 18/12/2017
 * Time: 15:00
 */
class ImageService extends Service
{

	public function find($request)
	{ 
    $result =  ImageRepository::getInstance()->find($request); 
    try{
      if(!empty($result)){
        $res['data'] = $result;
      }else {
        throw new \Exception("404");
      }
    }catch(\Exception $e) {
      $res['errors'] =$e->getMessage();
    }
    return $res;
	}
   	
 	public function findOne($id)
  {	
    try {
      $res['data'] = ImageRepository::getInstance()->findOne($id);
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = $e->getCode() != 0 ? $e->getCode() : 404;
    }
    return $res;
  }

  public function save($request)
  {	
    $validator = Validator::make($request->all(), [
      'file' => 'required',
    ],[/*message ja */]);
    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 400; 
    } else {
      try {
        $res['data'] = ImageRepository::getInstance()->save($request);
      } catch(\Expention $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = empty($e->getCode()) ? $e->getCode() : 500; 
      }  
    }
    return $res;  
	}

  public function update($request, $id)
  {   
    
	}

  public function delete($id)
  {
    try{
      $res['data'] = ImageRepository::getInstance()->delete($id);
    }catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = $e->getCode() != 0 ? $e->getCode() : 404;
    }
    return $res;
  }

}