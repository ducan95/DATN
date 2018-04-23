<?php

use Illuminate\Database\Seeder;

class ImagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {	
    	for($i=0;$i<=10;$i++) {
      	DB::table('images')->insert([
            'name'  			=> 'cover'.'25-12-2017'.$i.'.jpg' ,
            'description' 		=> 'cover' ,
            'path' 				=> 'pathDefault'.'25-12-2017'.$i.'.jpg'
        ]);
    	}
	  }

}
