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
      $global_status = ((isset($data['global_status']))?1:0);
      $menu_status = ((isset($data['menu_status']))?1:0);
      $category->fill([
        'name' => $data['name'],
        'slug' => $data['slug'],
        'global_status' => $global_status,
        'menu_status' => $menu_status,
        'is_deleted' => false,
        'id_category_parent' => 0
      ]);
      $category->save() ;
      return $category;
    }
    catch(\Exception  $e){ 
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
        'is_deleted' => false,
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

  public function delete($id)
  {
    try{
      $category=Category::find($id);
      if(!empty($category)){
        $category->delete();
      }else{
        throw new \Exception('Nothing');
      }
      }catch(\Exception $e){
        throw $e;
      }
  }

  public function list()
  { 
    try{
      $category=Category::where('id_category_parent','=',0)->get();
      return $category;
    }
    catch(\Exception $e){
      throw $e;
    }
  }

  public function listOne($id){
    try{
      $category = Category::find($id);
      if(!empty($category)) {
        return  $category;
      } else {
          throw new \Exception("404");
      }
    }catch(\Exception $e){ 
        throw $e;
    }
  }


  public function findOne($id)
  {
    try{
      $category=Category::find($id);
      if(!empty($category)){
          $categorychildren=Category::where('id_category_parent','=',$id)->get();
        }
      else{
        throw new \Exception("404");
        }
     return $categorychildren;
    }catch(\Exception $e){
        throw $e;
    }
  }

  public function find($dataRes){

  }
  public function saveChil($request){
      try{
      $data = $request->all();
      $category = new Category();
      $global_status = ((isset($data['global_status']))?1:0);
      $menu_status = ((isset($data['menu_status']))?1:0);
      $category->fill([
        'name' => $data['name'],
        'slug' => $data['slug'],
        'global_status' => $global_status,
        'menu_status' => $menu_status,
        'is_deleted' => false,
        'id_category_parent' => $data['id_category_parent']
      ]);
      $category->save() ;
      return $category;
    }
    catch(\Exception  $e){ 
      throw  $e;  
    }
    }

}
    
    

