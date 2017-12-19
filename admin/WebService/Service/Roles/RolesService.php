<?php
namespace WebService\Service\Roles;
use WebService\Repository\Roles\RolesRepository;
use WebService\Service\Service;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class RolesService extends Service
{
    public function list() 
    {
        return RolesRepository::getInstance()->list();
    }

    public function find($id)
    {   
        
        return RolesRepository::getInstance()->find($id);
    }

    public function save($request)
    {	// TODO: Implement save() method.
  		return RolesRepository::getInstance()->save($request);
    	
  	}

    public function update($request , $id)
    {
        return RolesRepository::getInstance()->getUpdate($request, $id);
    }

    public function delete($id)
    {	
    	return RolesRepository::getInstance()->delete($id);
    }

    

    public function findOne()
    {
    	// TODO: Implement findOne() method.
    }
}