<?php
namespace WebService\Repository\PostCategory;
use App\PostCategory;
use WebService\Repository\Repository;


/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class PostcategoryRepository extends Repository
{
  public function save($dataReq){
    try{
    $post_category=new PostCategory();
      $post_category->fill([
        'id_post' => $dataReq['post_category']['id_post'],
        'id_category' => $dataReq['post_category']['id_category'],
        'is_deleted'  =>$dataReq['post_category']['is_deleted']
      ]);
      $post_category->save();
      return $post_category;
     }
     catch(\Exception  $e) { 
      throw  $e;  
    }  
    }
  public function update($dataReq, $id){

  }
  public function delete($id){

  }
  public function find($dataReq){

  }
  public function findOne($id){

  }

}
    
    

       
