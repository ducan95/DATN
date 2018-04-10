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
    try{
        $res['data'] = UserRepository::getInstance()->save($request->all());
      } catch(\Exception $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
      }  
    return $res;
	}

  public function update($request, $id)
  {   
      try {
        $res['data'] = UserRepository::getInstance()->update($request->all(), $id);
      } catch(\Exception $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
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