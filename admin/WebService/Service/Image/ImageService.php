<?php
namespace WebService\Service\Image;
use WebService\Repository\Image\ImageRepository;
use WebService\Service\Service;
use Validator;
use Extention\Media;
/**
 * Created by PHPTEAM
 * User: Huynh
 * Date: 18/12/2017
 * Time: 15:00
 */
class ImageService extends Service
{ 
  /* trait Media contains image processing functions */
  use Media; 

	public function find($request)
	{ 
    try {
      $dataReq = [];
      if(!empty($request->query('name')) ) {
        $dataReq['name'] = $request->query('name');
      }
      if(!empty($request->query('description')) ) {
        $dataReq['description'] = $description;
      }
      if(!empty($request->query('path')) ) {
        $dataReq['path'] = $request->query('path');
      }
      if(!empty($request->query('path_paint')) ) {
        $dataReq['path_paint'] = $request->query('path_paint');
      }
      if(!empty($request->query('paginate')) ) {
        $dataReq['paginate'] = $request->query('paginate');
      }
      $res['data'] = ImageRepository::getInstance()->find($dataReq); 
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
	}
   	
 	public function findOne($id)
  {	
    try {
      $res['data'] = ImageRepository::getInstance()->findOne($id);
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }


  public function save($request)
  {	
    $validator = Validator::make($request->all(), [
      'file' => 'required|image| max:327680',
      'name' => 'required'
    ],[
      'file.required'=> trans('validate.image_required'),
      'file.image'=> trans('validate.image_must_be_valid_image_address'),
      'file.max'=> trans('validate.maximum_image_size_is_320MB'),
      'name' => trans('validate.name_exists')
    ]);
    
    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 400; 
    } else {
      try {
        $dataReq = $this->saveImage( $request->file('file'), $request->name); //return $dataReq;
        $res['data'] =  ImageRepository::getInstance()->save($dataReq);  
      } catch(\Expention $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] =  500; 
      }  
    }
    return $res;  
	}

  public function update($request, $id)
  {      
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:200',
    ],[
      'name.required'=> trans('validate.image_required'),
      'name.max'=> trans('validate.maximum_image_size_is_320MB'),
    ]);

    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 400; 
    } else {
      try {
        $image = ImageRepository::getInstance()->findOne($id); 
        $dataReq = $this->renameImage($image, $request->name); 
        if(!isset($dataReq['errors'])) {
          $res['data'] =  ImageRepository::getInstance()->update($dataReq, $id);     
        } else {
          $res['errors']['msg'] = $dataReq['errors'];
          $res['errors']['status_code'] =  500;   
        }
      } catch(\Expention $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] =  500; 
      }  
    }
    return $res; 
	}

  public function delete($id)
  {
    try {
      $res['data'] = ImageRepository::getInstance()->delete($id);
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

}