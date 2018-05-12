<?php
namespace WebService\Repository\Post;
use WebService\Repository\Repository;
use App\Post;
use App\ReleaseNumbers;
use App\PostCategory;
use App\Category;
use Illuminate\Support\Facades\Auth;

use DB;

class PostRepository extends Repository
{
  public function find($dataReq = '')
  {  
    $dataQueries = ['title', 'releaseNumber', 'categoryParent', 'categoryChildren', 'status', 'username', 'time_begin', 'paginate' ];

  	try{
      $query =  Post::join('post_category', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post');
                   })
                ->join('categories', function($join) {
                  $join->on('post_category.id_category', '=', 'categories.id_category'); 
                })
                ->join('release_numbers', function($join) {
                  $join->on('posts.id_release_number', '=', 'release_numbers.id_release_number');  
                })
                ->join('users', function($join) {
                  $join->on('posts.id_user', '=', 'users.id_user');
                   });
                
      $query =  $query ->select('posts.*', 'users.username as creator', 'categories.name as categories_name', 'release_numbers.name as release_name');    
      if(!empty($dataReq)) {
        if(isset($dataReq['releaseNumber'])) {
          $query =  $query->where('release_numbers.id_release_number', '=', $dataReq['releaseNumber']);
        }
        if(isset($dataReq['categoryParent'])) {
          $query =  $query->where('categories.id_category', '=', $dataReq['releaseNumber']);
        }
        if(isset($dataReq['categoryChildren'])) {
          $query =  $query->where('categories.id_category', '=', $dataReq['categoryChildren']);
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
      return $query->paginate(3);
      dd($query);	
   	} catch(\Exception $e) {
   		throw $e;
    }  
  }

  public function findOne($id)
  { 
  	try {
	    $query =  Post::join('post_category', function($join) {
                  $join->on('posts.id_post', '=', 'post_category.id_post');
                    })
                ->join('categories', function($join) {
                    $join->on('post_category.id_category', '=', 'categories.id_category');
                     })
                ->join('release_numbers', function($join) {
                    $join->on('posts.id_release_number', '=', 'release_numbers.id_release_number');
                     })
                ->join('users', function($join) {
                    $join->on('posts.id_user', '=', 'users.id_user');
                     })
                ->where('posts.id_post', '=', $id);
      $query =  $query ->select('posts.*', 'users.username as creator', 'categories.name as categories_name', 'release_numbers.name as release_name');
 		  return $query->get();
    } catch (\Exception $e) {
    	throw $e;
    }    
  }

  public function save($dataReq)
  {  
    try {
      $post = new Post();
      $post->fill([
        'id_release_number' => $dataReq['id_release_number'],
        'title' => $dataReq['title'],
        'slug' => $dataReq['title'],
        'thumbnail_path' => $dataReq['thumbnail_path'],
        'content' => $dataReq['content'],
        'id_user' => $dataReq['id_user'],
        'status' => $dataReq['status'],
        'time_end' => $dataReq['time_end'],
        'time_begin' => $dataReq['time_begin'],
        'password'   => bcrypt($dataReq['password'])
      ]);
      $post->save();
      return $post;
    }
    catch(\Exception  $e) { 
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
          'title'             => $data['title'],
          'slug'              => $data['slug'],
          'id_user'           => $data['id_user'],
          'password'          => $data['password'],
          'thumbnail_path'    => $data['thumbnail_path'],
          'id_release_number' => $data['id_release_number'],
          'time_begin'        => $data['time_begin'],
          'time_end'          => $data['time_end'],
          'status'            => $data['status']
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

  public function listOne($id){
    try{
      return Post::findOrFail($id);
    } catch(\Exception $e){
      throw $e;
    }
  }

  public function takeCatFirst($id_post){
    try{
      return DB::table('post_category')->where('id_post','=',$id_post)->select('id_category')->take(1)->get();
    } catch(\Exception $e){
      throw $e;
    }
  }

}
