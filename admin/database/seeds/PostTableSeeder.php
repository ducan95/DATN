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
            'thumbnail_path'=> 'imageDefault/archive2018-04-23-1.jpg',
            'time_begin'=>'2018-10-24',
            'time_end'=>'3000-01-01',
            'deleted_at' => null,
            'password'  => bcrypt('123'),
          ]);   
      }        	 
    }
}
