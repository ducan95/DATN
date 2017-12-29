<?php
namespace WebService\Repository\Member;
use App\Member;
use WebService\Repository\Repository;


/**
 * Created by PhpStorm.
 *  : rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class MemberRepository extends Repository
{

  public function save($dataReq)
  {
    try{
      $member = new Member();
      // $is_receive_email = ((isset($dataReq['is_receive_email']))?1:0);
      $member->fill([
        'email' 						=> $dataReq['email'],
        'password' 					=> bcrypt($dataReq['password']),
        'birthday'					=> $dataReq['birthday'],
        'gender' 						=> $dataReq['gender'],
        // 'is_receive_email' 	=> $is_receive_email,
        'member_plan_code' 	=> config('admin.member.member_plan_code'),
        'is_deleted' 				=> false,
      ]);
      $member->save() ;
      return $member;
    }
    catch(\Exception  $e){ 
      throw  $e;  
    }
  }

  public function update($dataReq,$id)
  {
  }

  public function delete($id)
  {
    try {
      if(!empty(Member::find($id))) {
        $member = Member::find($id);
        $member->is_deleted = true;
        $member->save();
      } else {
        return ;
      }
    } catch(\Exception  $e) { 
      throw $e;
    }
  }

  public function list()
  { 
    
  }

  public function listOne($id){
    
  }


  public function findOne($id)
  {
    
  }

  public function find($dataReq){
    try {   
      $query = Member::where('id_member', '>', 0)->where('is_deleted', '=', false);
      $dataMol= ['email', 'password', 'birthday', 'gender'];
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

}
    
    

