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

	

?>