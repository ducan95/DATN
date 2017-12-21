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
  public function find($dataReq = '') 
  { 
    try {   
      $query = User::where('id_user', '>', 0)->where('is_deleted', '=', false);
      $dataMol= ['username', 'email', 'status', 'id_role'];
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
        if(!empty($dataReq['paginate'])) {
          return $query->paginate($dataReq['paginate']); 
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
      return User::where('id_user', '=',$id)->where('is_deleted', '=', false)->first();
    } catch(\Exception $e){ 
      throw $e;
    }
  }

  public function save($dataReq)
  { 
    try{
      $user = new User();
      $user->fill([
        'username'   => $dataReq['username'],
        'email'      => $dataReq['email'],
        'password'   => bcrypt($dataReq['password']),
        'is_deleted' => false,
        'status'     => false,
        'id_role'    => $dataReq['id_role'],
      ]);
      $user->save() ;
      return $user;
    } catch(\Exception  $e) { 
      throw  $e;  
    }
  }

  public function update($dataReq, $id)
  { 
    try{
      $user = User::find($id);
      if(!empty($user)) {
        $user->fill([
          'username'    => $dataReq['username'],
          'email'       => $dataReq['email'],
          'password'    => bcrypt($dataReq['password']),
          'status'      => true,
          'is_delected' => false,
          'id_role'     => $dataReq['id_role'],
        ]);  
        $user->save();
        return $user;  
      } else {
        return null;
      }
    } catch(\Exception  $e){
      throw $e;
      
    }
  }

  public function delete($id)
  { 
    try {
      if(!empty(User::find($id))) {
        $user = User::find($id);
        $user->is_deleted = true;
        $user->save();
      } else {
        return ;
      }
    } catch(\Exception  $e) { 
      throw $e;
    }
  }

}