<?php
namespace WebService\Repository\Roles;
use WebService\Repository\Repository;
use App\Roles;
use Extention\Api;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class RolesRepository extends Repository
{
    public function list()
    {   
        $roles = Roles::orderBy('id_role','DESC')->get();
        return Api::response(['data' => $roles]);
    }

    public function find($id)
    {
        $role = Roles::find($id);
        if(!empty($role)) {
            return Api::response(['data' => $role]);
        } else {
            return Api::response(['status_code' => 404, 'is_success' => 'false']);
        }
        
    }

    public function save($request)
    {	
    // TODO: Implement save() method.
	  	$role = new Roles();
	  	$role->name= "name";//$request->name;
	  	$role -> save();
        return Api::response(['status_code' => 200, 'is_success' => 'true']);
    }

	public function update($request, $id)
	{
	    $role = Roles::findOrFail($id);
        $role->name = $request->name;
        $role->save();
        return Api::response(['status_code' => 200, 'is_success' => 'true']);
	}

    public function delete($id)
    {	
    	$role = Roles::findOrFail($id);
    	if (!empty($role)) {
    		if($role -> delete()) {
                return Api::response(['status_code' => 200, 'is_success' => 'true']);
    		}
    	}
    }

    

  public function findOne()
  {
    // TODO: Implement findOne() method.
  }
}