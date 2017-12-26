  

<h4>RKĐN_Internship_PHP </h4>
<h5>project : sougou_zyanaru</h5>

 - sử dụng đa ngôn ngữ : 
	 Cú pháp :   trans('từ khóa');
	 Nhiệm vụ:  chuyển ngôn ngữ từ tiếng anh ->tiếng nhật. 
	 EX: dùng cho show message validate ở WebService / Service/UserSercive.
	 	 * note :  lưu trữ dữ liệu theo kiểu cây để dể quản lí
 - File config/admin
	 cú pháp sử dung :  config('admin.$key');
	 Nhiệm vụ: Chứa các từ khóa thường dùng.
	  EX: dùng cho prefix trong web.php
	 * note :  lưu trữ dữ liệu theo kiểu cây để dể quản lí
 -  File Extension/helper
	 cú pháp sử dung : {{ ten function }};
	EX: dùng cho show url image ở index image.	
	 Nhiệm vụ: Chứa các public thường dùng ở enduser.


** 25/12: Cài dặt thư viện Intervention  ( blur image,  convert extension image to jpg)**
pull code sau đó dùng lệnh 
	
 -  composer update
 -  php artisan vendor:publish -- provider="Intervention\Image\ImageServiceProviderLaravel5"




	 

