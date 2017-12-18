<?php
namespace WebService\Service\Category;
use WebService\Repository\Category\CategoryRepository;
use WebService\Service\Service;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class CategoryService extends Service
{

  public function save($request)
  {
    $request->validate([
      'name' => 'required'
      'slug' => 'require'
    ],[]);
    try{
      $res['data']= CategoryRepository::getInstance()->save($request);
    }catch(\Exception $e){
      $res['errors']= $e ->getMessage();
    }
    return $res;
  }

  public function update($request,$id)
  {
    $request->validate([
      'name' => 'required'
      'slug' => 'require'
    ],[]);
    try{
      $res['data']=CategoryRepository::getInstance()->update($request,$id);
    }catch(\Exception $e){
      $res['errors']= $e ->getMessage();
    }
    return $res;
  }

  public function delete()
  {
    // TODO: Implement delete() method.
  }

  public function list()
  {
    $result= CategoryRepository::getInstance()->find();
    try
    {
      if(!empty($result)){
        $res['data']=$result;
      }
      else{
        throw new \Exception("No Record");
        
      }
    catch(\Exception $e){
        $res['errors']=$e->getMessage();
    }
    return $res;
  }

  public function findOne()
  {
    // TODO: Implement findOne() method.
  }
}