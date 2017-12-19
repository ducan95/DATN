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
  
  public function find($request , $paginate = true) 
  { 
    
  }

  public function findOne($id)
  { 
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
  	
  }

}