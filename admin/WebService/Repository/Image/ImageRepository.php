<?php
namespace WebService\Repository\Image;
use WebService\Repository\Repository;
use App\Images;
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
  
  public function find($request = '') 
  { 
    try {   
      if(isset($request)){
        $query = $query = Images::where('id_image', '>', 0)->where('is_deleted', '=', fasle);
        $name = $request->query('name'); 
        $description = $request->query('description'); 
        $path = $request->query('path'); 
        $path_paint = $request->query('path_paint'); 

        if(!empty($name)) {
          $query = $query->where('name', 'LIKE', '%'.$name.'%' );
        }

        if(!empty($description)) {
          $query = $query->where('description', 'LIKE', '%'.$description.'%' );
        }

        if(!empty($path)) {
          $query = $query->where('path', 'LIKE', '%'.$path.'%' );
        }

        if(!empty($path_paint)) {
          $query = $query->where('path_paint', 'LIKE', '%'.$path_paint.'%' );
        }

        if(!empty($request->query('paginate'))) {
          return $query->paginate($request->query('paginate')); 
        } else {
          return $query->get();  
        }
      }  
    } catch(\Exception $e) {
        throw $e;
    } 
  }

  public function findOne($id)
  { 
    try{
      $image = Images::where('id_image', "=", $id)->where('is_deleted', '=', false)->first();
      if(!empty($image)) {
        return $image; 
      } else {
        throw new \Exception("Khong tim thay");
      }
    } catch(\Exception $e){
      throw $e;
      
    }
  }

  public function save($request)
  { 
    $file = $request->file('file'); 
    $resImage = $this->saveImage( $file, config('admin.images.name.media'));
    try{
      $data = $request->all();
      $image = new Images();
      $image->fill([
        'name'   => $resImage['name'],
        'description' => config('admin.images.media'),
        'path'   => $resImage['path'],
        'path_paint' => "chua lam",
        'is_deleted' => false,
      ]);
      $image->save() ;
      return $image;
    } catch(\Exception  $e){ 
      throw  $e;  
    }
  }

  public function update($request, $id)
  { 
      
  }

  public function delete($id)
  { 
  	try{
      $image = Images::find($id);
      if(!empty($image)) {
        $image->is_deleted = true;
        $image->save();
      } else {
        throw new \Exception("404: Khong tim thay");
      }
    }catch(\Exception  $e){ 
        throw $e;
    }
  }

}