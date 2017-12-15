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

	public function list()
	{
		return UserRepository::getInstance()->list();
	}
   	
   	public function find($id)
    {	
    	return UserRepository::getInstance()->find($id);
    }

    public function save($request)
    {	
  		return UserRepository::getInstance()->save($request);
  	}

    public function update($request, $id)
    {
  		return UserRepository::getInstance()->update($request, $id);
  	}
    public function delete($id)
    {	
    	return UserRepository::getInstance()->delete();
   
    }

    public function findOne()
    {
    	//return UserRepository::getInstance()->findOne();
    }
}