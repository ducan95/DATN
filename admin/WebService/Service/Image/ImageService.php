<?php
namespace WebService\Service\Image;
use WebService\Repository\Image\ImageRepository;
use WebService\Service\Service;
use Validator;
use Extention\Media;
/**
 * Created by SublimeText.
 * User: Huynh
 * Date: 18/12/2017
 * Time: 15:00
 */
class ImageService extends Service
{
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
      if(!empty($request->query('namepost')) ) {
        $dataReq['namepost'] = $request->query('namepost');
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
      'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ],[
      'file.required'=> trans('validate.image_required'),
    ]);
    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 400; 
    } else {
      try {
        $dataReq = $this->saveImage( $request->file('file'), config('admin.images.name.media') );
        $res['data'] = ImageRepository::getInstance()->save($dataReq);  
      } catch(\Expention $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] =  500; 
      }  
    }
    return $res;  
	}

  public function update($request, $id)
  {      
     $res['data'] = $id; return $res;
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