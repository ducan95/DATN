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
	  	/*$title = ['thoi-su', 'kinh-doanh', 'van-hoa', 'giao-duc'];*/
      $limit = 4;
      
      for($i = 1; $i< $limit; $i++) {
        DB::table('posts')->insert([
            'id_release_number' => 1,
            'id_user' => 1,
            'title' => 'title',
            'slug' => 'slug-title',
            'content' => 'abc',
            'status' => true,
            'thumbnail_path'=> 'imageDefault/archive2018-01-24-552.jpg',
            'time_begin'=>'2016-10-24',
            'time_end'=>'2016-10-29',
            'status_preview_top'=>1,
            'deleted_at' => null,
            'is_deleted'=>false,
            'password'  => bcrypt('123'),
          ]);   
      }        	 
    }
}
