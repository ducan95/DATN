<?php
namespace WebService\Repository\Category;
use App\Category;
use WebService\Repository\Repository;


/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class CategoryRepository extends Repository
{

  public function save($request)
  {
     try{
      $data = $request->all();
      $category = new Category();
      $category->fill([
        'name' => $data['name'],
        'slug' => $data['slug'],
        'global_status' => $data['global_status'],
        'menu_status' => $data['menu_status'],
        'id_category_parent' => $data['id_category_parent'],
      ]);
      $category->save() ;
      return $category;
    } catch(\Exception  $e){ 
      throw  $e;  
    }
  }

  public function update($request,$id)
  {
    try{
      $data=$request->all();
      $category=Category::find($id);
      $category->fill([
        'name' => $data['name'],
        'slug' => $data['slug'],
        'global_status' => $data['global_status'],
        'menu_status' => $data['menu_status'],
        'id_category_parent' => $data['id_category_parent'],
      ]);
      $category->save();
      return $category;
    }catch(\Exception $e){
      throw $e;
    }
  }

  public function delete()
  {
    // TODO: Implement delete() method.
  }

  public function list()
  { 
    try{
      $category=Category::where('id_category_parent','=',0)-> oderBy('id_category','asc')->get();
    }
    return $category;
    catch(\Exception $e){
      throw $e;
    }
  }

  public function findOne()
  {
    // TODO: Implement findOne() method.
  }
  public function find($request){

  }
}
