<?php
namespace WebService\Service\Member;
use WebService\Repository\Member\MemberRepository;
use WebService\Service\Service;
use Validator;
/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class MemberService extends Service
{

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
    
  }

  public function delete($id)
  {
    
  }

  public function list()
  {
    
  }

    public function findOne($id)
    {
      
    }
    
    public function find($request)
    {

    }

}
      