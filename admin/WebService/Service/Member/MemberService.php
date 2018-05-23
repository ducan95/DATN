<?php
namespace WebService\Service\Member;
use WebService\Repository\Member\MemberRepository;
use WebService\Service\Service;
use Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class MemberService extends Service
{

  public function confirmEmail($request){
    $validator = Validator::make($request->all(), [
      'email'     => 'required|email',      
    ],[
      'email.required'    => trans('validate.email_required'),
      'email.email'       => trans('validate.email_must_be_valid_email_address'),
    ]);
    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 500;
    } else{
      try{
        $emailConfirmed = MemberRepository::getInstance()->confirmEmail($request);
        $allMember = MemberRepository::getInstance()->list();
        $check = 0;
        foreach ($allMember as $member) {
          if($emailConfirmed == $member->email){
            $check = 1;
            $res['errors']['email'] = trans('validate.webClient.email_exit') ;//email đã tồn tại
            break;
          }
        }
        if($check == 0){
          $res['data'] = $emailConfirmed;
        }
      }catch(\Exception $e){
        $res['errors']['msg'] = $e ->getMessage();
        $res['errors']['status_code'] = 500;
      }
    }
    return $res;
  }

  public function getPass($request,$id){
    $validator = Validator::make($request->all(), [
      'oldPassword'         => 'required|min:6|alpha_num',
      'password'            => 'required|min:6|alpha_num',      
      'confirmPassword'     => 'required|min:6|alpha_num',      
    ],[
      'oldPassword.required'  => trans('validate.password_required'),
      'oldPassword.min'       => trans('validate.webClient.password_min_6_characters'),
      'oldPassword.alpha_num' => trans('validate.webClient.alpha_num'),
      'password.required'     => trans('validate.password_required'),
      'password.min'          => trans('validate.webClient.password_min_6_characters'),
      'password.alpha_num'    => trans('validate.webClient.alpha_num'),
      'confirmPassword.required'  => trans('validate.password_required'),
      'confirmPassword.min'       => trans('validate.webClient.password_min_6_characters'),
      'confirmPassword.alpha_num' => trans('validate.webClient.alpha_num'),
    ]);
    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 500;
    } else {
      try{
        $res = MemberRepository::getInstance()->getPass($request);
        $email = Auth::guard('member')->user()->email;
        if(Auth::guard('member')->attempt(['password' => $res['oldPass'],'email' => $email ])){ //nếu đúng pass cũ
          if(Auth::guard('member')->attempt(['password' => $res['newPass'],'email' => $email ])){
            $res['errors']['pass'] = trans('validate.webClient.newpass_not_sam_oldpass'); //mk mới không dc giống mk cũ
          } else {
            if(isset($res['newPass']) && isset($res['confirmPass']) && (trim($res['newPass']) == trim($res['confirmPass']))){
              $res['data'] = MemberService::getInstance()->changeEmailPass($request,$id);
            } else{
              $res['errors']['newPass'] = trans('validate.webClient.invalid_password');//mật khẩu không hợp lệ
            }
          }            
        } else{
          $res['errors']['oldPass'] = trans('validate.webClient.incorrect_password'); //Nhập chưa đúng mk
        }
      }catch(\Exception $e){
        $res['errors']['msg'] = $e ->getMessage();
        $res['errors']['status_code'] = 500;
      }
    }    
    return $res;
  }

  public function changeEmailPass($request,$id){
    try{
      $res['data']= MemberRepository::getInstance()->changeEmailPass($request,$id);
    }catch(\Exception $e){
      $res['errors']['msg'] = $e ->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

  public function save($request)
  {
    $validator = Validator::make($request->all(), [
      'email'     => 'required|email',
      'password'  => 'required',
      
    ],[
      'email.required'    => trans('validate.email_required'),
      'email.email'       => trans('validate.email_must_be_valid_email_address'),
      'password.required' => trans('validate.password_required'),

    ]);
    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 500;
    } else {
      try{
        $res['data']= MemberRepository::getInstance()->save($request);
      }catch(\Exception $e){
        $res['errors']['msg'] = $e ->getMessage();
        $res['errors']['status_code'] = 500;
      }
    }
    return $res;
  }

  public function update($request,$id)
  {
    $validator = Validator::make($request->all(), [
      'email'     => 'required|email',
      /*'password'  => 'required',*/
      
    ],[
      'email.required'    => trans('validate.email_required'),
      'email.email'       => trans('validate.email_must_be_valid_email_address'),
      /*'password.required' => trans('validate.password_required'),*/

    ]);
    if($validator ->fails()) {
      $res['errors']['msg'] = $validator->errors();
      $res['errors']['status_code'] = 500;
    } else {
      try{
        $res['data'] = MemberRepository::getInstance()->update($request->all(), $id);
      }catch(\Exception $e){
        $res['errors']['msg'] = $e ->getMessage();
        $res['errors']['status_code'] = 500;
      }
    }
    return $res; 
  }

  //active/deactive
  public function active($id){
    try{
      $res['data'] = MemberRepository::getInstance()->active($id);
    }catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

  //delete
  public function delete($id)
  {
    try{
      $res['data'] = MemberRepository::getInstance()->delete($id);
    }catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
    
  }

  public function list()
  {
    $result= MemberRepository::getInstance()->list();
    try
    {
      if(!empty($result)){
        $res['data']=$result;
      }
      else{
        throw new \Exception("No Record");
        }
    }    
    catch(\Exception $e){
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

  public function findOne($id)
  {
    try {
      $res['data'] = MemberRepository::getInstance()->findOne($id);
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }
    
  public function find($request)
  {
    try {
      $dataReq = [];
      if(!empty($request->query('email')) ) {
        //query <=> $_GET->()...
        $dataReq['email'] = $request->query('email');
      }
      if(!empty($request->query('password')) ) {
        $dataReq['password'] = $request->query('password');
      }
      if(!empty($request->query('birthday')) ) {
        $dataReq['birthday'] = $request->query('birthday');
      }
      if(!empty($request->query('gender')) ) {
        $dataReq['gender'] = $request->query('gender');
      }
      if(!empty($request->query('paginate')) ) {
        $dataReq['paginate'] = $request->query('paginate');
      }
      $res['data'] = MemberRepository::getInstance()->find($dataReq); 
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
  }

}
      