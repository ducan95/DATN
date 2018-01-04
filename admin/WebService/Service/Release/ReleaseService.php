<?php

namespace WebService\Service\Release;

use Validator;
use WebService\Service\Service;
use Illuminate\Support\Facades\Auth;
use WebService\Repository\Release\ReleaseRepository;

/**
* Create by Quyen Luu
* Date: 28/12/2017  
*/
class ReleaseService extends Service
{

  /**
   * Find release number
   * @param  [$request]
   * @return [$res]
   */
  public function find($request)
  {
    try {
      $dataReq = [];

      if (!empty($request->query('name'))) {
        $dataReq['name'] = $request->query('name');
      }
      if (!empty($request->query('image_release_path'))) {
        $dataReq['image_release_path'] = $request->query('image_release_path');
      }
      if (!empty($request->query('image_header_path'))) {
        $dataReq['image_header_path'] = $request->query('image_header_path');
      }

      $res['data'] = ReleaseRepository::getInstance()->find($dataReq);  

    } catch(\Exception $e) {
      $res['errors']['msg']         = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }

    return $res;
  }

  /**
   * [Find 1 release number]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function findOne($id)
  {
    try {
      $res['data'] = ReleaseRepository::getInstance()->findOne($id);
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }
  
  /**
   * [Save release number]
   * @param  [type] $request [description]
   * @return [type]          [description]
   */
  public function save($request)
  { 
    $validator = Validator::make($request->all(), 
      [
        'name' => 'required',
      ], 
      [
        'name.required' => trans('release.nameRequired'),
      ]
    );

    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 400;
    } else {
      try {
        $dataReq['name'] = $request->name;
        //$dataReq['is_deleted'] = false;
        $dataReq['image_release_path'] = !empty($request->image_release_path) ? $request->image_release_path : 'imageDefault/no-image.jpg';
        $dataReq['image_header_path']  = !empty($request->image_header_path) ? $request->image_header_path : 'imageDefault/no-banner.jpg';
        $res['data'] = ReleaseRepository::getInstance()->save($dataReq);
        return $res;
      } catch(\Exception $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
      }  
    }
    
    return $res;
  }

  public function update($request , $id)
  {
    // TODO: Implement update() method.
  }

  /**
   * [Delete Release number]
   * @param  [type] $id [description]
   * @return [type]     [description]
   */
  public function delete($id)
  {
    try {
      $res['data'] = ReleaseRepository::getInstance()->delete($id);
    } catch(\Exception $e) {
      $res['errors']['msg']         = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }

    return $res;
  }

  
}