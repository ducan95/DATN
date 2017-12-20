<?php 
	namespace Extention;
	use App\Images;

trait Media {


	protected function saveImage($file, $name, $path ='')
	{
    $nameImage = $this->createNameImage($name, $file); 
   // $fileBulr =  $this->createImageBlur($file);
    return [
      'name' => $nameImage,
      //'path' => $fileBulr->storeAs(config('images.path.imageBlur'), $nameImage),
      'path' => $file->storeAs(config('admin.images.path.imageDefault'), $nameImage),
    ];
	}
 
	protected function createNameImage($name, $file )
	{			
		if(empty($name)) {
    	$name = empty($name) ? str_random(10).time() . '_'  : $name ;
    }	
		$stt = Images::where('name', 'LIKE', '%'.$name.'%')->count()+2;
		$name = $name. date('Y-m-d').$stt.".". $file->getClientOriginalExtension();
		return $name;
	}

	protected function deleteImage()
	{
		Storage::disk('public')->delete($path);
	}

	protected function createImageBlur($file)
	{
		// Create a 55x30 image
		$im = imagecreatetruecolor(55, 30);
		$red = imagecolorallocate($im, 255, 0, 0);
		$black = imagecolorallocate($im, 0, 0, 0);

		// Make the background transparent
		imagecolortransparent($im, $black);

		// Draw a red rectangle
		imagefilledrectangle($im, 4, 4, 50, 25, $red);

		// Save the image
		imagepng($im, './imagecolortransparent.png');
		//imagedestroy($im);
		$im->storeAs(config('admin.images.path.imageDefault'), "huynh.png");
		
	}




}






?>
