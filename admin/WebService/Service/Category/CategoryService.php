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
      'name' => 'required',
      'slug' => 'required',
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
    try{
      $res['data']=CategoryRepository::getInstance()->update($request,$id);
    }catch(\Exception $e){
      $res['errors']= $e ->getMessage();
    }
    return $res;
  }

  public function delete($id)
  {
    try{
      $res['data']=CategoryRepository::getInstance()->delete($id);
    }catch(\Exception $e){
      $res['errors']=$e -> getMessage();
    }
    return $res;
  }

  public function list()
  {
    $result= CategoryRepository::getInstance()->list();
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
          $res['errors']= $e->getMessage();
      }
      return $res;
    }

    public function findOne($id)
    {
      $result=CategoryRepository::getInstance()->findOne($id);
      try{
        if(!empty($result)){
        $res['data'] = $result;
      }
      else{
        throw new \Exception('No Record');
      }
      }catch(\Exception $e) {
        $res['errors'] = $e->getMessage();
      }
    return $res;
    }
    
    public function find($request)
    {

    }

}