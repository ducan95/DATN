<?php
namespace WebService\Repository\PostCategory;
use App\PostCategory;
use WebService\Repository\Repository;



class PostcategoryRepository extends Repository
{
  public function save($dataReq){
    try{
    $post_category=new PostCategory();
    $post_category->fill([
      'id_post'     =>  $dataReq['id_post'],
      'id_category' =>  $dataReq['id_category'],
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
    
    

       
