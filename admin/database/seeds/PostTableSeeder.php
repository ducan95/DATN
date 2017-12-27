<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	$title = ['thoi su', 'kinh doanh', 'van hoa', 'giao duc'];
    	$limit = 20;
    	
    	for($i = 0; $i<= $limit; $i++) {
    		$title = rand_array($title,1).$i;
	    	DB::table('posts')->insert([
	        	'id_release_number' => rand(1,10),
	        	'title' => $title,
	        	'slug' =>slug($title),
	        	'status' => true,
	        	'password' => bcrypt(123),
	        	'thumbnail'=> "thumbnail",
	        	'thumbnail_path'=> "thumbnail",
	        	'time_begin'=>dateTime(),
	        	'time_end'=>dateTime(),
	        	'status_preview_top'=>false,
	        	'deleted_at' => null,
	        	'is_deleted'=>false
	        ]);		
    	}    
    }
}
