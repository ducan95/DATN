<?php
namespace WebService\Repository\Post;
use WebService\Repository\Repository;
use App\Post;
use App\ReleaseNumbers;
use App\PostCategory;
use App\Category;


/**
 * Created by PhpStorm.
 * User: Huynh
 * Date: 13/12/2017
 * Time: 19:37
 */
class PostRepository extends Repository
{
  public function find($dataReq = '')
  {  
    $dataQueries = ['title', 'releaseNumber', 'categoryParent', 'categoryChildren', 'status', 'username', 'time_begin', 'paginate' ];

  	try{
      $query =  Post::join('post_category', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post')
                  ->where('post_category.is_deleted','=',false);  })
                ->join('categories', function($join) {
                  $join->on('post_category.id_category', '=', 'categories.id_category')
                  ->where('categories.is_deleted','=',false);  })
                ->join('release_numbers', function($join) {
                  $join->on('posts.id_release_number', '=', 'release_numbers.id_release_number')
                  ->where('release_numbers.is_deleted','=', false);  })
                ->join('users', function($join) {
                  $join->on('posts.id_user', '=', 'users.id_user')
                  ->where('users.is_deleted','=',false); });

      $query =  $query ->select('posts.*', 'users.username as creator', 'categories.name as categories_name', 'release_numbers.name as release_name');    
      if(!empty($dataReq)) {
        if(isset($dataReq['releaseNumber'])) {
          $query =  $query->where('release_numbers.id_release_number', '=', $dataReq['releaseNumber']);
        }
        if(isset($dataReq['categoryParent'])) {
          $query =  $query->where('categories.id_category_parent', '=', $dataReq['releaseNumber']);
        }
        if(isset($dataReq['categoryChildren'])) {
          $query =  $query->where('categories.id_category_parent', '=', $dataReq['categoryChildren']);
        }
        if(isset($dataReq['time_begin'])) {
          $query =  $query->whereDate('posts.time_begin', $dataReq['categoryChildren']);
        }
        if(isset($dataReq['title'])) {
          $query =  $query->where('posts.title', 'LIKE', '%'.$dataReq['title'].'%');
        }
        if(isset($dataReq['status'])) {
          $query =  $query->where('posts.status', '=', $dataReq['status']);
        }
        if(isset($dataReq['username'])) {
          $query =  $query->where('users.username', 'LIKE', '%'.$dataReq['username'].'%');
        }
        if(isset($dataReq['paginate'])) {
          return $query->paginate($dataReq['paginate']);
        }
      }
      return $query->paginate(2);	
   	} catch(\Exception $e) {
   		throw $e;
    }  
  }

  public function findOne($id)
  { 
  	try {
	    $query =  Post::join('post_category', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post')
                  ->where('post_category.is_deleted','=',false);  })
                ->join('categories', function($join) {
                    $join->on('post_category.id_category', '=', 'categories.id_category')
                    ->where('categories.is_deleted','=',false);  })
                ->join('release_numbers', function($join) {
                    $join->on('posts.id_release_number', '=', 'release_numbers.id_release_number')
                    ->where('release_numbers.is_deleted','=', false);  })
                ->join('users', function($join) {
                    $join->on('posts.id_user', '=', 'users.id_user')
                    ->where('users.is_deleted','=',false); })
                ->where('posts.id_post', '=', $id);
      $query =  $query ->select('posts.*', 'users.username as creator', 'categories.name as categories_name', 'release_numbers.name as release_name');
 		  return $query->get();
    } catch (\Exception $e) {
    	throw $e;
    }    
  }

  public function save($dataReq)
  { 
     try{
      $post = new Post();  
      $dataFill = [];
      foreach ($post->getFillable() as $col) {
        if(isset($dataReq[$col])) {
          $dataFill[$col] = $dataReq[$col];
        } else {
          throw new \Exception($col." thieu");
        }
      }   
      $post->fill($dataFill);
      $post->save();
      return $post;
    }
    catch(\Exception  $e){ 
      throw  $e;  
    }
  }

  public function update($dataReq, $id)
  { 
    try{
   		$data=$dataReq->all();
     	$post = Post::find($id);
     	 if(!empty($post)) {
       	$post->fill([
          'title'    					=> $data['title'],
          'slug'							=> $data['slug'],
          'id_user'						=> $data['id_user'],
          'thumbnail_path'		=> $data['thumbnail_path'],
          'status_preview_top'=> $data['status_preview_top'],
          'deleted_at'				=> $data['deleted_at'],
          'id_release_number' => $data['id_release_number'],
          'time_begin'    		=> $data['time_begin'],
          'time_end'      		=> $data['time_end'],
          'is_deleted' 				=> $data['is_deleted'],
          'status'     				=> $data['status']
        ]);  
        $post->save();
        return $post;  
      } else {
        return null;
      }
    } catch(\Exception  $e){
      throw $e;
      
    }
  }

  public function delete($id)
  { 
    
  }

}
