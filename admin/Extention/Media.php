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
		// tao ra image bi mo tu image truyen vao
		// return image lam mo
	}




}






?>
