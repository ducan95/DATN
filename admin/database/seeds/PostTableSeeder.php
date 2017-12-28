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
      $titles = ['thoi su', 'kinh doanh', 'van hoa', 'giao duc'];      
      foreach ($titles as $title) {
        DB::table('posts')->insert([
          'id_release_number' => 1,
          'title' => $title,
          'slug' =>$title,
          'status' => true,
          'password' => 123,
          'thumbnail_path'=> "thumbnail",
          'time_begin'=> 2017-12-27 03:30:39,
          'time_end'=> 2017-12-27 03:30:39,
          'status_preview_top'=>false,
          'deleted_at' => null,
          'is_deleted'=>false
        ]);     
      }    
    }
}
