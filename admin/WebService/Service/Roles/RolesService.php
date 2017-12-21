<?php
namespace WebService\Service\Roles;
use WebService\Repository\Roles\RolesRepository;
use WebService\Service\Service;
use Validator;

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

    /**
     * Find function
     * @pram 
     * Return res
     */
    public function find($request)
	{ 
    try {
      //Lấy dữ liệu
      $dataReq = [];
      if(!empty($request->query('name')) ) {
        $dataReq['name'] = $request->query('name');
      }
      if(!empty($request->query('role_code')) ) {
        $dataReq['role_code'] = $request->query('role_code');
      }
      $res['data'] = RolesRepository::getInstance()->find($dataReq); 
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }

    return $res;
	}

    public function findOne($id)
    {	
    try {
        $res['data'] = RolesRepository::getInstance()->findOne($id);
    } catch(\Exception $e) {
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
    }
    return $res;
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
}