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

	}
   	
 	public function findOne($id)
  {	

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

  }

}