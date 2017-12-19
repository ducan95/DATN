<?php
namespace WebService\Repository\User;
use WebService\Repository\Repository;
use App\User;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class UserRepository extends Repository
{
  public function find($request , $paginate = true) 
  { 
    $keywords = $request->all(); 
    $data = ['username','email','status','id_role']; 
    $query = User::where('id_user', '>', 0);
    if(!empty($keywords)) {
      foreach ($data as $value) {  
        if($request->has($value) && !empty($keywords[$value])) {       
          if(is_string($keywords[$value])) {
            $keywork = '%'.$keywords[$value].'%';
            $query->where($value, 'like', $keywork);
          } else { 
            $query->where($value, '=', $keywords[$value]);
          }
        }
      }
    }
    if ($paginate) {
        return $query->get();//paginate(50); 
    } else {
        return $query->all();
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
        'status'     => false,
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
          'status'      => false,
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