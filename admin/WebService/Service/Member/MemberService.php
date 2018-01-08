<?php
namespace WebService\Service\Member;
use WebService\Repository\Member\MemberRepository;
use WebService\Service\Service;
use Validator;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class MemberService extends Service
{

  public function save($request)
  {
    $validator = Validator::make($request->all(), [
      'email'     => 'required|email',
      'password'  => 'required',
      
    ],[
      'email.required'    => trans('validate.email_required'),
      'email.email'       => trans('validate.email_must_be_valid_email_address'),
      'password.required' => trans('validate.password_required'),

    ]);
    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 500;
    } else {
      try{
        $res['data']= MemberRepository::getInstance()->save($request);
      }catch(\Exception $e){
        $res['errors']['msg'] = $e ->getMessage();
        $res['errors']['status_code'] = 500;
      }
    }
    return $res;
  }

  public function update($request,$id)
  {
    $validator = Validator::make($request->all(), [
      'email'     => 'required|email',
      'password'  => 'required',
      
    ],[
      'email.required'    => trans('validate.email_required'),
      'email.email'       => trans('validate.email_must_be_valid_email_address'),
      'password.required' => trans('validate.password_required'),

    ]);
    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 500;
    } else {
      try{
        $res['data'] = MemberRepository::getInstance()->update($request->all(), $id);
      }catch(\Exception $e){
        $res['errors']['msg'] = $e ->getMessage();
        $res['errors']['status_code'] = 500;
      }
    }
    return $res; 
  }

  //active/deactive
  public function active($id){
    try{
      $res['data'] = MemberRepository::getInstance()->active($id);
    }catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

  //delete
  public function delete($id)
  {
    try{
      $res['data'] = MemberRepository::getInstance()->delete($id);
    }catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
    
  }

  public function list()
  {
    $result= MemberRepository::getInstance()->list();
    try
    {
      if(!empty($result)){
        $res['data']=$result;
      }
      else{
        throw new \Exception("No Record");
        }
    }    
    catch(\Exception $e){
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

  public function findOne($id)
  {
    try {
      $res['data'] = MemberRepository::getInstance()->findOne($id);
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }
    
  public function find($request)
  {
    try {
      $dataReq = [];
      if(!empty($request->query('email')) ) {
        //query <=> $_GET->()...
        $dataReq['email'] = $request->query('email');
      }
      if(!empty($request->query('password')) ) {
        $dataReq['password'] = $request->query('password');
      }
      if(!empty($request->query('birthday')) ) {
        $dataReq['birthday'] = $request->query('birthday');
      }
      if(!empty($request->query('gender')) ) {
        $dataReq['gender'] = $request->query('gender');
      }
      if(!empty($request->query('paginate')) ) {
        $dataReq['paginate'] = $request->query('paginate');
      }
      $res['data'] = MemberRepository::getInstance()->find($dataReq); 
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

}
      