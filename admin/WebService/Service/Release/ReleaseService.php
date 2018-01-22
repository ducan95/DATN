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
        $dataReq['image_release_path'] = !empty($request->image_release_path) ? $request->image_release_path : 'assets/img/no-image.jpg';
        $dataReq['image_header_path']  = !empty($request->image_header_path) ? $request->image_header_path : 'assets/img/no-banner.jpg';
        $res['data'] = ReleaseRepository::getInstance()->save($dataReq);
        return $res;
      } catch(\Exception $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
      }  
    }
    
    return $res;
  }

  /**
   * [update description]
   * @param  [type] $request [description]
   * @param  [type] $id      [description]
   * @return [type]          [description]
   */
  public function update($request , $id)
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
        $dataReq['image_release_path'] = !empty($request->image_release_path) ? $request->image_release_path : 'assets/img/no-image.jpg';
        $dataReq['image_header_path']  = !empty($request->image_header_path) ? $request->image_header_path : 'assets/img/no-banner.jpg';
        $res['data'] =  ReleaseRepository::getInstance()->update($dataReq, $id);   
      } catch(\Exception $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
      }  
    }
    return $res;
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

  public function list(){
    try{
      $res['data'] = ReleaseRepository::getInstance()->list();
    } catch(\Exception $e){
      $res['errors'] = $e->getMessage();
    }
    return $res;
  }
  
  public function listOne($id){
    try{
      $res['data'] = ReleaseRepository::getInstance()->listOne($id);
    } catch(\Exception $e){
      $res['errors'] = $e->getMessage();
    }
    return $res;
  }

  public function loadmoreRelease($offset, $row_count){
    $result = ReleaseRepository::getInstance()->loadmoreRelease($offset, $row_count);
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

  public function postOfRelease($id){
    $result = ReleaseRepository::getInstance()->postOfRelease($id);
    try{
      if(!empty($result)){
        $res['data'] = $result;
      }
      else{
        throw new \Exception('No record');
      }
    } catch(\Exception $e){
      $res['errors'] = $e->getMessage();
    }
    return $res;
  }

  public function loadmorePostOfRelease($offset, $row_count, $id){
    $result = ReleaseRepository::getInstance()->loadmorePostOfRelease($offset, $row_count, $id);
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
}