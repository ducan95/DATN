<?php
namespace WebService\Service\Category;
use WebService\Repository\Category\CategoryRepository;
use WebService\Service\Service;
use Validator;
use DB;

class CategoryService extends Service
{

  public function save($request)
  {
      try{
        $res['data']= CategoryRepository::getInstance()->save($request->all());
      }catch(\Exception $e){
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
      }
    return $res;
  }

  public function update($request,$id)
  {
   
  }

  public function updatechil($request,$id)
  {
    try{
      $res['data']=CategoryRepository::getInstance()->updatechil($request,$id);
    }catch(\Exception $e){
      $res['errors']= $e ->getMessage();
    }
    return $res; 
  }

  public function delete($id)
  {
    // khởi tạo transaction ở đây
    DB::beginTransaction();
    try{
      $res['data'] = CategoryRepository::getInstance()->delete($id);
      DB::commit();
    } catch(\Exception $e) {
      DB::rollBack();
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
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

  public function listOne($id){
   try {
      $res['data'] = CategoryRepository::getInstance()->listOne($id);
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
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
      try {
      $res['data'] = CategoryRepository::getInstance()->find($request); 
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
    }

    public function findCat($request)
    {
      try {
      $res['data'] = CategoryRepository::getInstance()->findCat($request); 
    } catch(\Exception $e) {
      $res['errors']['msg'] = $e->getMessage();
      $res['errors']['status_code'] = 500;
    }
    return $res;
    }
    
    public function saveChil($request){
      try{
        $res['data']= CategoryRepository::getInstance()->saveChil($request->all());
      }catch(\Exception $e){
        $res['errors']['msg'] = $e->getMessage();
        $res['errors']['status_code'] = 500;
      }
    return $res;
      }
      
      
    // public function find($id)
    // {
    //   $result=CategoryRepository::getInstance()->find($id);
    //   try{
    //     if(!empty($result)){
    //     $res['data'] = $result;
    //   }
    //   else{
    //     throw new \Exception('No Record');
    //   }
    //   }catch(\Exception $e) {
    //     $res['errors'] = $e->getMessage();
    //   }
    //   return $res;
    // }

    public function cat($id){
      $result = CategoryRepository::getInstance()->cat($id);
      try{
        if(!empty($result)){
          $res['data'] = $result;
        }
        else{
          throw new \Exception('No record');
        }
      } catch(\Exception $e){
        $res['errors'] = $e->getMessage();
      }
      return $res;
    }

    public function loadmoreCat($offset, $row_count, $id){
      $result = CategoryRepository::getInstance()->loadmoreCat($offset, $row_count, $id);
      try{
        if(!empty($result)){
          $res['data'] = $result;
        }
        else{
          throw new \Exception('No record');
        }
      } catch(\Exception $e){
        $res['errors'] =$e->getMessage();
      }
      return $res;
    }

}
      
