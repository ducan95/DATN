<?php
namespace WebService\Repository\User;
use WebService\Repository\Repository;
use App\User;
use Extention\Api;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class UserRepository extends Repository
{

	public function list() 
	{
		$users = User::all();
        return Api::response([ 'data' => $users]);
	}

	public function find($id)
    {	
    	$user = User::find($id);
    	if(!empty($user)) {
            return Api::response([ 'data' => $user]);
    	} else {
            return Api::response([ 'is_success' => 'false', 'status_code' => 404]);
    	}
    }

    public function save($request)
    {	
    	$data = $request->all();
    	$user = new User();
    	$user->fill([
    		'username' => $data['username'],
    		'email' => $data['email'],
    		'password' => bcrypt($data['password']),
    		'status' => 0,
    		'id_role' => $data['id_role'],
    	]);
    	$user->save();
        return Api::response([ 'is_success' => 'true', 'status_code' => 201]);
    }

	public function update($request, $id)
	{	
	    $data = $request->all();
    	$user = User::find($id); 
    	$user->fill([
    		'username' => $data['username'],
    		'email' => $data['email'],
    		'password' => bcrypt($data['password']),
    		'status' => 0,
    		'id_role' => $data['id_role'],
    	]);
    	$user->save();
       return Api::response(); 
	}

    public function delete($id)
    {	
    	$user = User::findOrFail($id);
    	if(!empty($user)) {
    		if($user->delete()) {
                return Api::response();
    		}
    	} else {
            return Api::response(['is_success'=> 'false', 'status_code' => 404]);
    	}

    }

    

  public function findOne()
  {
    // TODO: Implement findOne() method.
  }
}