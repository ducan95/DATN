<?php

use Illuminate\Database\Seeder;

class Release_numberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('release_numbers')->insert([
        	'name' => 'SPH001',
        	'image_release' => '001.jpg',
          	'image_header' => '002.jpg',
        ]);
    }
}
