<?php
namespace WebService\Repository\Roles;
use WebService\Repository\Repository;
use App\Roles;
use Extention\Api;


/**
 * Created by PhpStorm.
 * Roles: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class RolesRepository extends Repository
{
    public function list()
    {   
        $roles = Roles::orderBy('id_role','ASC')->get();
        return Api::response(['data' => $roles]);
    }

    /**
     * Find fuction
     */
	public function find($dataReq = '') 
	{ 
    try {   
      $query = Roles::where('id_role', '>', 0);
      $dataMol= ['name', 'role_code'];
      if(!empty($dataReq)) {
        foreach ($dataMol as $value) {
          if(isset($dataReq[$value])) {
            if(is_string($dataReq[$value])) {
              $query = $query->where($value, 'LIKE', '%'.$dataReq[$value].'%' );
            } else {
              $query = $query->where($value, '=', $dataReq[$value] );
            }
          }    
        }
      } 
      return $query->get();    
    } catch(\Exception $e) {
        throw $e;
    } 
  }

  public function findOne($id)
  {
    try {
      return Roles::where('id_role', '=',$id)->first();
    } catch(\Exception $e){ 
      throw $e;
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

    


}