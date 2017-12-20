<?php
namespace WebService\Repository\User;
use WebService\Repository\Repository;
use App\User;

/**
 * Created by PhpStorm.
 * User: Huynh
 * Date: 13/12/2017
 * Time: 19:37
 */
class UserRepository extends Repository
{
  public function find($request = '') 
  { 
    try {   
      if(isset($request)){
        $query = User::where('id_user', '>', 0)->where('is_deleted', '=', false);
        $username = $request->query('username'); 
        $email = $request->query('email'); 
        $status = $request->query('status'); ; 
        $id_role = $request->query('id_role'); 
        if(!empty($username)) {
          $query = $query->where('username', 'LIKE', '%'.$username.'%' );
        }
        if(!empty($email)) {
          $query = $query->where('email', 'LIKE', '%'.$email.'%' );
        }
        if(!empty($status)) {
          $query = $query->where('status', '=', $status );
        }
        if(!empty($id_role)) {
          $query = $query->where('id_role', '=', $id_role);
        }
        if(!empty($request->query('paginate'))) {
          return $query->paginate($request->query('paginate')); 
        } else {
          return $query->get();  
        }
      }  
    } catch(\Exception $e) {
        throw $e;
    } 
  }

  public function findOne($id)
  { 
    try{
      $user = User::find($id);
      if(!empty($user)) {
        return  $user;
      } else {
          throw new \Exception("404");
      }
    }catch(\Exception $e){ 
        throw $e;
    }
  }

  public function save($request)
  { 
    try{
      $data = $request->all();
      $user = new User();
      $user->fill([
        'username'   => $data['username'],
        'email'      => $data['email'],
        'password'   => bcrypt($data['password']),
        'is_deleted' => false,
        'status'     => true,
        'id_role'    => $data['id_role'],
      ]);
      $user->save() ;
      return $user;
    } catch(\Exception  $e){ 
      throw  $e;  

    }
  }

  public function update($request, $id)
  { 
    try{
      $data = $request->all();
      $user = User::find($id);
      if(!empty($user)) {
        $user->fill([
          'username'    => $data['username'],
          'email'       => $data['email'],
          'password'    => bcrypt($data['password']),
          'status'      => true,
          'is_delected' => false,
          'id_role'     => $data['id_role'],
        ]);  
        $user->save();
        return $user;  
      } else {
        throw new \Exception("404: khong tim thay");
      }
    } catch(\Exception  $e){
      throw $e;
      
    }
  }

  public function delete($id)
  { 
    try{
      $user = User::find($id);
      if(!empty($user)) {
        $user->delete();
      } else {
        throw new \Exception("404: Khong tim thay");
      }
    }catch(\Exception  $e){ 
        throw $e;
    }
  }

}