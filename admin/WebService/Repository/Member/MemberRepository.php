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

  public function confirmEmail($dataReq){
    try{
      return $dataReq['email'];
    }
    catch(\Exception $e){
      throw $e;
    }    
  }

  public function list()
  { 
    try{
      $allMembers = Member::all();
      return $allMembers;
    }
    catch(\Exception $e){
      throw $e;
    }
  }

  public function getPass($dataReq){
    try{
      $res['oldPass'] = $dataReq['oldPassword'];
      $res['newPass'] = $dataReq['password'];
      $res['confirmPass'] = $dataReq['confirmPassword'];
      return $res;
    }
    catch(\Exception $e){
      throw $e;
    }
  }

  /*public function changePass($dataReq, $id){
    try{
      $member = Member::find($id);
      if(!empty($member)) {
        $is_receive_email = ((isset($dataReq['is_receive_email']))?1:0);
        $password = (isset($dataReq['password']))? bcrypt($dataReq['password']) :  $member->password;
        $email = (isset($dataReq['email']))? $dataReq['email'] :  $member->email;
        $gender = (isset($dataReq['gender']))? $dataReq['gender'] :  $member->gender;
        $birthday = $member->birthday;
        $member->fill([
          'email'             => $email,
          'password'          => $password,
          'birthday'          => $birthday,
          'gender'            => $gender,
          'is_receive_email'  => $is_receive_email,
          'member_plan_code'  => config('admin.member.member_plan_code'),
          'is_deleted'        => false,
          'is_active'         => true,
        ]);
        $member->save();
        return $member;  
      } else {
        return null;
      }
    } catch(\Exception  $e){
      throw $e;
      
    }
  }
*/
  public function changeEmailPass($dataReq,$id)
  {
    try{
      $member = Member::find($id);
      if(!empty($member)) {
        $is_receive_email = ((isset($dataReq['is_receive_email']))?1:0);
        $password = (isset($dataReq['password']))? bcrypt($dataReq['password']) :  $member->password;
        $email = (isset($dataReq['email']))? $dataReq['email'] :  $member->email;
        $gender = (isset($dataReq['gender']))? $dataReq['gender'] :  $member->gender;
        $birthday = $member->birthday;
        $member->fill([
          'email'             => $email,
          'password'          => $password,
          'birthday'          => $birthday,
          'gender'            => $gender,
          'is_receive_email'  => $is_receive_email,
          'member_plan_code'  => config('admin.member.member_plan_code'),
          'is_active'         => true,
        ]);
        $member->save();
        return $member;  
      } else {
        return null;
      }
    } catch(\Exception  $e){
      throw $e;
    }
  }
  //create new member
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
        'is_active'         => true,
      ]);
      $member->save() ;
      return $member;
    }
    catch(\Exception  $e){ 
      throw  $e;  
    }
  }

  //update member
  public function update($dataReq,$id)
  {
    try{
      $member = Member::find($id);
      if(!empty($member)) {
        $is_receive_email = ((isset($dataReq['is_receive_email']))?1:0);
        $password = (isset($dataReq['password']))? bcrypt($dataReq['password']) :  $member->password;
        $gender = (isset($dataReq['gender']))? $dataReq['gender'] :  $member->gender;
        $birthday = (isset($dataReq['birthday']))? $dataReq['birthday']: new date($member->birthday);
        $member->fill([
          'email'             => $dataReq['email'],
          'password'          => $password,
          'birthday'          => $dataReq['birthday'],
          'gender'            => $dataReq['gender'],
          'is_receive_email'  => $is_receive_email,
          'member_plan_code'  => config('admin.member.member_plan_code'),
          'is_active'         => true,
        ]);
        $member->save();
        return $member;  
      } else {
        return null;
      }
    } catch(\Exception  $e){
      throw $e;
      
    }
  }

  //active/deactive
  public function active($id){
    try {
      if(!empty(Member::find($id))) {
        $member = Member::find($id)->where('deleted_at','=',null);
        $member->is_active = ($member->is_active)?'false':'true';
        $member->save();
      } else {
        return ;
      }
    } catch(\Exception  $e) { 
      throw $e;
    }
  }
  
  //delete member
  public function delete($id)
  {
    try {
      if(!empty(Member::find($id))) {
        $member = Member::find($id);
        $member->delete();
      } else {
        return ;
      }
    } catch(\Exception  $e) { 
      throw $e;
    }
  }

  //get
  public function findOne($id)
  {
    try {
      return Member::where('id_member', '=',$id)->where('deleted_at','=',null)->first();
    } catch(\Exception $e){ 
      throw $e;
    }
  }

  //display list member
  public function find($dataReq = ''){
    try {   
      $query = Member::where('id_member', '>', 0)->where('deleted_at','=',null)->orderBy('id_member','ASC');
      //that's fields what i want to show in index
      $dataMol= ['email', 'password', 'birthday', 'gender'];
      //check to show
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
      return $query->paginate(5);    
    } catch(\Exception $e) {
        throw $e;
    }
  }

}
    
    

