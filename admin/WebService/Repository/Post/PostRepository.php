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
      if(Auth::user()->role_code == 's_admin' || Auth::user()->role_code == 'admin'){
        $query =  $query ->select('posts.*', 'users.username as creator', 'categories.name as categories_name', 'release_numbers.name as release_name','post_category.id_category');
      }
      else{        
        $query =  $query ->select('posts.*', 'users.username as creator', 'categories.name as categories_name', 'release_numbers.name as release_name','post_category.id_category')->where('users.username','=',Auth::user()->username);
      }    
      if(!empty($dataReq)) {
        if(isset($dataReq['release_name'])) {
          $query =  $query->where('release_numbers.name','LIKE', '%'.$dataReq['release_name'].'%');
        }
        if(isset($dataReq['categories_name'])) {
          $query =  $query->where('categories.name','LIKE','%'.$dataReq['categories_name'].'%');
        }
        if(isset($dataReq['title'])) {
          $query =  $query->where('posts.title', 'LIKE', '%'.$dataReq['title'].'%');
        }
        if(isset($dataReq['username'])) {
          $query =  $query->where('users.username', 'LIKE', '%'.$dataReq['username'].'%');
        }
        if(isset($dataReq['paginate'])) {
          return $query->paginate($dataReq['paginate']);
        }
      }
      return $query->paginate(10);	
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
      $query =  $query ->select('posts.*', 'users.username as creator', 'categories.name as categories_name', 'release_numbers.name as release_name','categories.id_category');
 		  return $query->get();
    } catch (\Exception $e) {
    	throw $e;
    }    
  }

  public function save($dataReq)
  {  
    try {
      $post = new Post();
      if(Auth::user()->role_code == 's_admin' || Auth::user()->role_code == 'admin'){
        $post->fill([
          'id_release_number'   => $dataReq['id_release_number'],
          'title'               => $dataReq['title'],
          'slug'                => $dataReq['title'],
          'thumbnail_path'      => $dataReq['thumbnail_path'],
          'content'             => $dataReq['content'],
          'id_user'             => $dataReq['id_user'],
          'is_acept'            => true,
        ]);
        }
      else{
        $post->fill([
          'id_release_number'   => $dataReq['id_release_number'],
          'title'               => $dataReq['title'],
          'slug'                => $dataReq['title'],
          'thumbnail_path'      => $dataReq['thumbnail_path'],
          'content'             => $dataReq['content'],
          'id_user'             => $dataReq['id_user'],
          'is_acept'            => false,
        ]);
      }  
      $post->save();
      return $post;
    }
    catch(\Exception  $e) { 
      throw  $e;  
    }
  }
  public function update($dataReq, $id){

  }
  public function update1($dataReq,$id)
  { 
    try{
      $post = Post::find($id);
     	 if(!empty($post)) {
       	$post->fill([
          'title'             => $dataReq['title'],
          'slug'              => $dataReq['title'],
          'id_user'           => $dataReq['id_user'],
          'content'           => $dataReq['content'],
          'thumbnail_path'    => $dataReq['thumbnail_path'],
          'id_release_number' => $dataReq['id_release_number'],
          'is_acept'          => $dataReq['is_acept']
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
    try {
      if (!empty(Post::find($id))) {
        $release = Post::find($id);
        $release->delete();
      } else {
        return null;
      }
    } catch(\Exception $e) {
      throw $e;
    }
  }
  public function list(){
    try{
      return DB::table('posts')->where('is_acept','=',1)->where('deleted_at','=',null)->orderBy('id_post','DESC')->get();
    } catch(\Exception $e){
      throw $e;
    }
  }

  public function loadmorePost($offset, $row_count){
    try{
      $oItemsLoad = DB::table('posts')->where('is_acept','=',1)->where('deleted_at','=',null)->orderBy('id_post','DESC')->skip($offset)->take($row_count)->get();
      return $oItemsLoad;
    } catch(\Exception $e){
      throw $e;
    }
  }

  public function listOne($id){
    try{
      $post= DB::table('posts')->join('users', function($join) {
        $join->on('posts.id_user', '=', 'users.id_user');  })->where('posts.id_post','=',$id)->select('posts.*','users.username')->get();
      return $post;
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
