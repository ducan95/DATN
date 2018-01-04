<?php 
namespace Extention;
use App\Images;
use File;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;	
use Illuminate\Support\Facades\Storage; 

trait Media {


	protected function saveImage($image, $name, $path ='')
	{	
		$imageBlur = Image::make($image->getRealPath()); 
		$imageBlur->blur(15);
		$imageBlur->encode('jpg');
        $destinationPath = public_path('storage/'.config('admin.images.path.imageBlur'));
        $nameImage = $this->createNameImage($name); $nameImage = $nameImage['name'];
        $imageBlur->save($destinationPath.'/'.$nameImage);
        return [
          'name' => $nameImage,
          'path' => $image->storeAs(config('admin.images.path.imageDefault'), $nameImage, 'public'),
          'path_blur' => config('admin.images.path.imageBlur').'/'.$nameImage,
        ];
	}
 

	protected function createNameImage($name )
	{	
    $nameImage = ['media', 'cover', 'archive'];
    $result = [
      'name' => $name,
      'status' => false,
    ];
    try {
      foreach ( $nameImage as $item) {
        if (strlen(strstr($name, $item)) > 0) {
          $image = Images::where('name', '=', trim($name))->first();
          if(empty($image)) {
            $stt = Images::where('name', 'LIKE', '%'.$name.'%')->count()+1; 
            $result['name'] = ($name === $item) ? $name. date('Y-m-d')."-".$stt.".jpg" : $name; 
            $result['status'] = true;
            return $result ;break;
          } else {
            throw new \Exception(trans('validate.name_exists'));
          }
        }  
      }    
      if(!$result['status']) {
        throw new \Exception(trans('validate.name_invalid'));
      } 
    } catch(\Exception $e) {
      throw $e; 
    }
    
	}

	protected function deleteImage($path)
	{ 
    Storage::disk('public')->delete($path);
	}

  protected function getPath($path, $typeImage, $name) 
  { 
    try {
      $pathImage = public_path('storage/'.$path); // get url image
      $newImage = Image::make($pathImage);//create new image 
      $newImage = ($typeImage == 'imageBlur') ?  $newImage->blur(15) : $newImage;
      $destinationPath = public_path( 'storage/'.config('admin.images.path.'.$typeImage) );
      if ($newImage->save($destinationPath.'/'.$name)) {
        $this->deleteImage($path);
        return config('admin.images.path.'.$typeImage).'/'.$name;  
      } 
    } catch(\Exception  $e) {
      throw $e;
    }
  }

  protected function renameImage($image, $name) 
  {
    $typeImage = ['imageDefault', 'imageBlur'];
    try {
      $result = $this->createNameImage($name); 
      return [ 
        'name' => $result['name'],
        'path' => $this->getPath($image->path, $typeImage[0], $result['name']),
        'path_blur' => $this->getPath($image->path_blur, $typeImage[1], $result['name'])
      ];
    }catch(\Exception $e) {
      $res['errors'] = $e->getMessage();
      return $res;
    }   
  } 

}






?>
