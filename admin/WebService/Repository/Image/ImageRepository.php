<?php
namespace WebService\Repository\Image;
use WebService\Repository\Repository;
use App\Images;
use App\PostImage;
use App\Post;
use Extention\Media;
/**
 * Created by SublimeText.
 * User: Huynh
 * Date: 18/12/2017
 * Time: 15:00
 */
class ImageRepository extends Repository
{
  
   use Media; 
  public function find($dataReq = '') 
  { 
    try {   
      $query = Images::where('images.id_image', '>', 0)
              ->where('images.is_deleted','=', false);
      $dataMol= ['name', 'description', 'path', 'path_blur'];
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
        if(!empty($dataReq['paginate'])) {
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
    try{
      return Images::where('images.id_image', "=", $id)
              ->where('images.is_deleted', '=', false)
              ->first();
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
          'path'   => $dataReq['path'],
          'path_blur' => $dataReq['path_blur'],
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
    try{
      if(isset($dataReq)) {
        $image = Images::where('id_image', '=', $id)->where('is_deleted', '=', false)->first();
        $image->name = $dataReq['name'];
        $image->path = $dataReq['path'];
        $image->path_blur = $dataReq['path_blur'];
        $image->save() ;
        return $image;  
      }
    } catch(\Exception  $e){ 
      throw  $e;  
    }
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