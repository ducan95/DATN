<?php

use Illuminate\Database\Seeder;

class Post_categoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $limit = 40;
      
      for($i = 0; $i< $limit; $i++) {
        DB::table('post_category')->insert([
            'id_post' => 1,
            'id_category' => 1,
          ]);   
      }        	
    }
}
