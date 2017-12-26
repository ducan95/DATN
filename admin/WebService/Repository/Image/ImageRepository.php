<?php
namespace WebService\Repository\Image;
use WebService\Repository\Repository;
use App\Images;
use App\PostImage;
use App\Post;

/**
 * Created by SublimeText.
 * User: Huynh
 * Date: 18/12/2017
 * Time: 15:00
 */
class ImageRepository extends Repository
{
  
  
  public function find($dataReq = '') 
  { 
    try {   
      $query = Images::leftjoin('post_image', 'images.id_image', '=', 'post_image.id_image')
              ->leftjoin('posts', 'post_image.id_post', '=', 'posts.id_post')
              ->select('images.*', 'posts.title as namePost')
              ->select('images.*',  'posts.title as namePost')
              ->where('images.id_image', '>', 0)
              ->where('images.is_deleted','=', false);
      $dataMol= ['name', 'description', 'path', 'path_paint'];
      if(!empty($dataReq)) {
        foreach ($dataMol as $value) { 
          if(isset($dataReq[$value]) ) {
            if(is_string($dataReq[$value])) {
              $query = $query->where('images.'.$value, 'LIKE', '%'.$dataReq[$value].'%' );
            } else {
              $query = $query->where('images.'.$value, '=', $dataReq[$value] );
            }
          } 
        }
        if(isset($dataReq['namepost'])) {
          $query = $query->where('posts.title', 'LIKE', '%'.$dataReq['namepost'].'%' );
        }
        if(!empty($dataReq['paginate'])) {
          return $query->paginate($dataReq['paginate']); 
        }  
      } 
      return $query->get();
    } catch(\Exception $e) {
        throw $e;
    } 
  }

  public function findOne($id)
  { 
    try{
      return Images::join('post_image', 'images.id_image', '=', 'post_image.id_image')
      ->join('posts', 'post_image.id_post', '=', 'posts.id_post')
      ->where('images.id_image', "=", $id)
      ->where('images.is_deleted', '=', false)
      ->select('images.*', 'posts.title as namePost')->get();
    } catch(\Exception $e){
      throw $e;
    }
  }

  public function save($dataReq )
  { 
    try{
      if(isset($dataReq)) {
        $image = new Images();
        $image->fill([
          'name'   => $dataReq['name'],
          'description' => config('admin.images.media'),
          'path'   => $dataReq['pathDefault'],
          'path_paint' => $dataReq['pathBlur'],
          'is_deleted' => false,
        ]);
        $image->save() ;
        return $image;  
      }
    } catch(\Exception  $e){ 
      throw  $e;  
    }
  }

  public function update($dataReq, $id)
  { 
      
  }

  public function delete($id)
  { 
  	try {
      if(!empty(Images::find($id)) ) {
        $image = Images::find($id);
        $image->is_deleted = true;
        $image->save();
      } else {
        return ;
      }
    } catch(\Exception $e) { 
      throw $e;
    }
  }

}