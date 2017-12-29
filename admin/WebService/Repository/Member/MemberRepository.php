<?php
namespace WebService\Repository\Member;
use App\Member;
use WebService\Repository\Repository;


/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class MemberRepository extends Repository
{

  public function save($dataReq)
  {
    try{
      $member = new Member();
      $is_receive_email = ((isset($dataReq['is_receive_email']))?1:0);
      $member->fill([
        'email' 						=> $dataReq['email'],
        'password' 					=> bcrypt($dataReq['password']),
        'birthday'					=> $dataReq['birthday'],
        'gender' 						=> $dataReq['gender'],
        'is_receive_email' 	=> $is_receive_email,
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
    
  }

  public function list()
  { 
    try{
      $member=Member::where('is_deleted','=',false)->get();
      return $member;
    }
    catch(\Exception $e){
      throw $e;
    }
  }

  public function listOne($id){
    
  }


  public function findOne($id)
  {
    
  }

  public function find($dataReq){

  }

}
    
    

