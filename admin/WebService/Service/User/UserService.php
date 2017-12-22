<?php
namespace WebService\Service\User;
use WebService\Repository\User\UserRepository;
use WebService\Service\Service;
use Validator;
use Illuminate\Support\Facades\Auth;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class UserService extends Service
{

	public function find($request)
	{ 
    try {
      $dataReq = [];
      if(!empty($request->query('username')) ) {
        $dataReq['username'] = $request->query('username');
      }
      if(!empty($request->query('email')) ) {
        $dataReq['email'] = $request->query('email');
      }
      if(!empty($request->query('status')) ) {
        $dataReq['status'] = $request->query('status');
      }
      if(!empty($request->query('role_code')) ) {
        $dataReq['role_code'] = $request->query('role_code');
      }
      if(!empty($request->query('paginate')) ) {
        $dataReq['paginate'] = $request->query('paginate');
      }
      $res['data'] = UserRepository::getInstance()->find($dataReq); 
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }

    return $res;
	}
   	
 	public function findOne($id)
  {	
  	try {
      $res['data'] = UserRepository::getInstance()->findOne($id);
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

  public function save($request)
  {	
    $validator = Validator::make($request->all(), [
      'username' => 'required|max:200',
      'email' => 'required |email',
      'password' => 'required',
      'role_code' =>  'required'
    ],[
      'username.required' => trans('validate.username_required'),
      'username.max' => trans('validate.username_max_255_characters'),
      'email.required' => trans('validate.email_required'),
      'email.email' => trans('validate.email_must_be_valid_email_address'),
      'password.required' => trans('validate.password_required'),
      'role_code.required' => trans('validate.role_code_required')
    ]);

    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 400;
    } else {
      try{
        $res['data'] = UserRepository::getInstance()->save($request->all());
      } catch(\Exception $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
      }  
    }
    return $res;
	}

  public function update($request, $id)
  {   
    $validator = Validator::make($request->all(), [
      'username' => 'required|max:255',
      'email' => 'required |email',
      'password' => 'required',
      'role_code' =>  'required'
    ],[
      'username.required' => trans('validate.username_required'),
      'username.max' => trans('validate.username_max_255_characters'),
      'email.required' => trans('validate.email_required'),
      'email.email' => trans('validate.email_must_be_valid_email_address'),
      'password.required' => trans('validate.password_required'),
      'role_code.required' => trans('validate.role_code_required')
    ]);

    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 400;
    } else {
      try {
        $res['data'] = UserRepository::getInstance()->update($request->all(), $id);
      } catch(\Exception $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
      }  
    }
    return $res;
	}

  public function delete($id)
  {
    try{
      $res['data'] = UserRepository::getInstance()->delete($id);
    }catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

}