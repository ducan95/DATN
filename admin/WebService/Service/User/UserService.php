<?php
namespace WebService\Service\User;
use WebService\Repository\User\UserRepository;
use WebService\Service\Service;

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
    if(!empty($result)) {    
      return $result = [
        'is_success' => true,
        'status_code' => 200,
        'data' =>  $result,
        'errors' => [],
      ];
    } else {
      return $result = [
        'is_success' => false,
        'status_code' => 404,
        'data' =>  [],
        'errors' => ""
      ] ;
    }
	}
   	
 	public function findOne($id)
  {	
  	$result =  UserRepository::getInstance()->findOne($id);
    if($result['is_success']) {    
      return $result = [
        'is_success' => true,
        'status_code' => 200,
        'data' =>  $result['data'],
        'errors' => [],
      ];
    } else {
      return $result = [
        'is_success' => false,
        'status_code' => 404,
        'data' =>  [],
        'errors' => $result['error']
      ] ;
    }
  }

  public function save($request)
  {	
    $request->validate([
      'username' => 'required',
      'password' => 'required',
      'email' => 'required | email ',
      'id_role' => 'required',

    ]);
    $result = UserRepository::getInstance()->save($request); 
    if($result['is_success']) {  
      return $result = [
        'is_success' => true,
        'status_code' => 201,
        'data' =>  $result['data'],
        'errors' => [],
      ];
    } else {
      return $result = [
        'is_success' => false,
        'status_code' => 500,
        'data' =>  $result['data'],
        'errors' => $result['error'],
      ] ;
    }
	}

  public function update($request, $id)
  {   
    $request->validate([
        'username' => 'required',
        'password' => 'required',
        'email' => 'required | email',
        'id_role' => 'required',
    ]);
		$result = UserRepository::getInstance()->update($request, $id);  
    if($result['is_success']) {  
      if($result['data']) {
        return $result = [
          'is_success' => true,
          'status_code' => 200,
          'data' =>  $result['data'],
          'errors' => [],
        ];
      } else {
        return $result = [
          'is_success' => false,
          'status_code' => 404,
          'data' =>  $result['data'],
          'errors' => 'id not exists',
        ];
      }
      
    } else {
      return $result = [
        'is_success' => false,
        'status_code' => 500,
        'data' =>  [],
        'errors' => $result['error']
      ] ;
    }
	}

  public function delete($id)
  {	
  	$result =  UserRepository::getInstance()->delete($id); 
    if($result['is_success']) {    
      return $result = [
        'is_success' => true,
        'status_code' => 201,
        'data' =>  [],
        'errors' => [],
      ];
    } else {
      return $result = [
        'is_success' => false,
        'status_code' => 404,
        'data' =>  [],
        'errors' => $result['error']
      ] ;
    }
  }

}