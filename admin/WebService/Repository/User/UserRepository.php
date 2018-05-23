<?php
namespace WebService\Repository\User;
use WebService\Repository\Repository;
use App\User;

class UserRepository extends Repository
{
  public function find($dataReq = '') 
  { 
    try {   
      $query = User::where('id_user', '>', 0);
      $dataMol= ['username', 'email', 'status', 'role_code'];
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
      return User::where('id_user', '=',$id)->first();
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
        'status'     => true,
        'role_code'  => $dataReq['role_code'],
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
          'role_code'     => $dataReq['role_code'],
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
        $user->delete();
      } else {
        return ;
      }
    } catch(\Exception  $e) { 
      throw $e;
    }
  }

}