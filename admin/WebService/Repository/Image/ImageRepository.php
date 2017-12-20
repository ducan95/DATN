<?php
namespace WebService\Repository\Image;
use WebService\Repository\Repository;
use App\Images;

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
      $query = $query = Images::where('id_image', '>', 0)->where('is_deleted','=', false);
      $dataMol= ['name', 'description', 'path', 'path_paint'];
      if(!empty($dataReq)) {
        foreach ($dataMol as $value) { 
          if(isset($dataReq[$value]) ) {
            if(is_string($dataReq[$value])) {
              $query = $query->where($value, 'LIKE', '%'.$dataReq[$value].'%' );
            } else {
              $query = $query->where($value, '=', $dataReq[$value] );
            }
          } 
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
      return Images::where('id_image', "=", $id)->where('is_deleted', '=', false)->first();
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
          'path_paint' => "chua lam",
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