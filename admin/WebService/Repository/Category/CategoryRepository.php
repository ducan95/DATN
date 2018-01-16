<?php
namespace WebService\Repository\Category;
use App\Category;
use WebService\Repository\Repository;
use DB;

/**
 * Created by PhpStorm.
 * User: rikkei
 * Date: 13/12/2017
 * Time: 19:37
 */
class CategoryRepository extends Repository
{

  public function save($dataReq)
  {
    try{
      $category = new Category();
      $global_status = ((isset($dataReq['global_status']))?1:0);
      $menu_status = ((isset($dataReq['menu_status']))?1:0);
      $category->fill([
        'name' => $dataReq['name'],
        'slug' => $dataReq['slug'],
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

  public function update($dataReq,$id)
  {
    try{
      $data=$dataReq->all();
      // $global_status = ((isset($data['global_status']))?1:0);
      // $menu_status = ((isset($data['menu_status']))?1:0);
      $category=Category::find($id);
      $category->fill([
        'name' => $data['name'],
        'slug' => $data['slug'],
        'is_deleted' => false,
        'global_status' => $data['global_status'],
        'menu_status' => $data['menu_status'],
        'id_category_parent' => 0
      ]);
      $category->save();
      return $category;
    }catch(\Exception $e){
      throw $e;
    }
  }

  public function updatechil($dataReq,$id){
    try{
      $data=$dataReq->all();
      // $global_status = ((isset($data['global_status']))?1:0);
      // $menu_status = ((isset($data['menu_status']))?1:0);
      $category=Category::find($id);
      $category->fill([
        'name' => $data['name'],
        'slug' => $data['slug'],
        'is_deleted' => false,
        'global_status' => $data['global_status'],
        'menu_status' => $data['menu_status'],
        'id_category_parent' => $data['id_category_parent']
      ]);
      $category->save();
      return $category;
    }catch(\Exception $e){
      throw $e;
    }
  }

  public function delete($id)
  {
    try {
      if(!empty(Category::find($id))){
        $category = Category::find($id);
        $category->is_deleted=true;
        $category->save();
        if($category->id_category_parent === 0){ 
          $categoryChildrens=Category::where('id_category_parent','=',$id)->where('is_deleted','=',false)->get();
          foreach ($categoryChildrens as $categoryChildren) {
            $categoryChildren->is_deleted=true;
            $categoryChildren->save();
          }
          
        }
        else{
        $category->is_deleted = true;
        $category->save();
        }
      } else {
        return  ;
      }
    } catch(\Exception  $e) { 
      throw $e;
    }
  }


  public function list()
  { 
    try{
      $category=Category::where('id_category_parent','=',0)->orderBy('id_category', 'asc')->where('is_deleted','=',false)->get();
      return $category;
    }
    catch(\Exception $e){
      throw $e;
    }
  }

  public function listOne($id){
    try {
      return Category::where('id_category','=',$id)->where('is_deleted','=',false)->get();
    } catch(\Exception $e){ 
      throw $e;
    }
  }



  public function findOne($id)
  {
    try{
      $category=Category::find($id);
      if(!empty($category)){
          $categorychildren=Category::where('id_category_parent','=',$id)->where('is_deleted','=',false)->orderBy('id_category', 'asc')->get();
        }
      else{
        throw new \Exception("404");
        }
     return $categorychildren;
    }catch(\Exception $e){
        throw $e;
    }
  }


  public function saveChil($dataReq){
      try{
      $data = $dataReq->all();
      $category = new Category();
      $global_status = ((isset($dataReq['global_status']))?1:0);
      $menu_status = ((isset($dataReq['menu_status']))?1:0);
      $category->fill([
        'name' => $data['name'],
        'slug' => $data['slug'],
        'global_status' => $global_status,
        'menu_status' => $menu_status,
        'is_deleted' => false,
        'id_category_parent' => $data['parent_category']
      ]);
      $category->save() ;
      return $category;
    }
    catch(\Exception  $e){ 
      throw  $e;  
    }
  }

  //tim mot category bat ky (ke ca category cha + con)
  public function find($id){
    try{
      return Category::findOrFail($id);
    } catch(\Exception $e){
      throw $e;
    }
  }

  public function cat($id){
    try{
      $arPosts =  DB::table('post_category')->join('posts', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post');  })
                ->join('categories', function($join) {
                  $join->on('post_category.id_category', '=', 'categories.id_category');  })->where('post_category.id_category','=',$id)->select('categories.id_category', 'posts.id_post','content','thumbnail_path','title','time_begin','posts.slug')->get();
                /*dd($arPosts);
                die();*/
      return $arPosts;
    } catch(\Exception $e){
      throw $e;
    }
  }
  
  //hiển thị $row_count tin thuộc cat có id_cat  = $id, từ vị trí $offset  
  public function loadmoreCat($offset, $row_count, $id){
    try{
      $arPostsLoad = DB::table('post_category')->join('posts', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post');  })
                ->join('categories', function($join) {
                  $join->on('post_category.id_category', '=', 'categories.id_category');  })->where('post_category.id_category','=',$id)->select('categories.id_category', 'posts.id_post','content','thumbnail_path','title','time_begin','posts.slug')->skip($offset)->take($row_count)->get();
      return $arPostsLoad;
    } catch(\Exception $e){
      throw $e;
    }
  }

}
    
    

       
