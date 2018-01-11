<?php 
	
	/**
   * public use function
   * @param  
   * @return 
   */ 


	if (!function_exists('storage_asset')) {
		function storage_asset($url = '')
		{       
		  return asset('storage/' . trim($url, '/'));
		}
	}
	
	function format_date($date){
		try {
 			if($date != null) {
 				$objArray = explode('-', $date);
 				$date = $objArray[0]."年".$objArray[1]."月".$objArray[2]."日";
 				return $date;
 			} else {
 				throw "undefined"; // 
 			}
 		}catch(\Exception  $e){
 			throw $e;
 		}
	}

?>