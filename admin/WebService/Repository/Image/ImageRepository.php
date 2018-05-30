<?php
namespace WebService\Repository\Image;
use WebService\Repository\Repository;
use App\Images;
use App\PostImage;
use App\Post;
use Extention\Media;

class ImageRepository extends Repository
{
  
   use Media; 
  public function find($dataReq = '') 
  { 
    try {   
      $query = Images::where('images.id_image', '>', 0);
      $dataMol= ['name', 'description', 'path'];
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
          'path'   => $dataReq['path']
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
        $image = Images::where('id_image', '=', $id)->first();
        $image->name = $dataReq['name'];
        $image->path = $dataReq['path'];
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
        $image->delete();
      } else {
        return ;
      }
    } catch(\Exception $e) { 
      throw $e;
    }
  }

}