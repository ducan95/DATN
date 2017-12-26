<?php 
	namespace Extention;
	use App\Images;
	use File;
	use Intervention\Image\ImageManagerStatic as Image;

trait Media {


	protected function saveImage($image, $name, $path ='')
	{	
	
		$imageBlur = Image::make($image->getRealPath()); 
		$imageBlur->blur(15);
		$imageBlur->encode('jpg');
    $destinationPath = public_path('storage/imageBlur');
    $nameImage = $this->createNameImage($name, $image);
    $imageBlur->save($destinationPath.'/'.$nameImage);
    return [
      'name' => $nameImage,
      'pathDefault' => $image->storeAs(config('admin.images.path.imageDefault'), $nameImage, 'public'),
      'pathBlur' => config('admin.images.path.imageBlur').'/'.$nameImage,
    ];
	}
 
	protected function createNameImage($name, $image )
	{			
		if(empty($name)) {
    	$name = empty($name) ? str_random(10).time() . '_'  : $name ;
    }	
		$stt = Images::where('name', 'LIKE', '%'.$name.'%')->count()+2;
		$name = $name. date('Y-m-d')."-".$stt.".jpg";
		return $name;
	}

	protected function deleteImage()
	{
		Storage::disk('public')->delete($path);
	}

}






?>
