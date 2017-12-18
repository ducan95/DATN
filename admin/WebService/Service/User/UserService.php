<?php
namespace WebService\Service\User;
use WebService\Repository\User\UserRepository;
use WebService\Service\Service;
use Validator;
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
    $result =  UserRepository::getInstance()->find($request); 
    try{
      if(!empty($result)){
        $res['data'] = $result;
      }else {
        throw new \Exception("no thing");
      }
    }catch(\Exception $e) {
      $res['errors'] =$e->getMessage();
    }
    return $res;
	}
   	
 	public function findOne($id)
  {	
  	try{
      $res['data'] = UserRepository::getInstance()->findOne($id);
    }catch(\Exception $e) {
      $res['errors'] = $e->getMessage();
    }
    return $res;
  }

  public function save($request)
  {	
    $validator = Validator::make($request->all(), [
      'username' => 'required|max:255',
      'email' => 'required |email',
      'password' => 'required',
      'id_role' =>  'required'
    ],[]);
    if($validator ->fails()) {
      $res['errors'] = $validator->errors();
      return $res;  
    }
    try{
      $res['data'] = UserRepository::getInstance()->save($request);
    }catch(\Exception $e) {
      $res['errors'] = $e->getMessage();
    }
    return $res;
	}

  public function update($request, $id)
  {   
    $validator = Validator::make($request->all(), [
      'username' => 'required|max:255',
      'email' => 'required |email',
      'password' => 'required',
      'id_role' =>  'required'
    ],[]);
    if($validator ->fails()) {
      $res['errors'] = $validator->errors();
      return $res;  
    }

		try{
      $res['data'] = UserRepository::getInstance()->update($request, $id);
    }catch(\Exception $e) {
      $res['errors'] = $e->getMessage();
    }
    return $res;
	}

  public function delete($id)
  {
    try{
      $res['data'] = UserRepository::getInstance()->delete($id);
    }catch(\Exception $e) {
      $res['errors'] = $e->getMessage();
    }
    return $res;
  }

}