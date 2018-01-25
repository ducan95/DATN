<?php

use Illuminate\Database\Seeder;

class PostCategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $limit = 4;
      
      for($i = 1; $i< $limit; $i++) {
        DB::table('post_category')->insert([
            'id_post' => $i,
            'id_category' => 1,
            'is_deleted' =>false
          ]);   
      }        	
    }
}
