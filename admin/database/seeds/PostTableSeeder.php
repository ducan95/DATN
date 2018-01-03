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
	  	$title = ['thoi-su', 'kinh-doanh', 'van-hoa', 'giao-duc'];
      $limit = 4;
      
      for($i = 0; $i< $limit; $i++) {
        $tit = $title[$i].$i;
        DB::table('posts')->insert([
            'id_release_number' => 1,
            'id_user' => 1,
            'title' => $tit,
            'slug' => $title[$i],
            'status' => true,
            'thumbnail_path'=> 'thumbnail',
            'time_begin'=>'2016-10-24',
            'time_end'=>'2016-10-29',
            'status_preview_top'=>false,
            'deleted_at' => null,
            'is_deleted'=>false
          ]);   
      }        	 
    }
}
