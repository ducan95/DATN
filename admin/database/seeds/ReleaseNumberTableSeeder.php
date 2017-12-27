<?php

use Illuminate\Database\Seeder;

class ReleaseNumberTableSeeder extends Seeder
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
        	'image_release_path' => '001.jpg',
          	'image_header_path' => '002.jpg',
          	'is_deleted'        => false
        ]);
    }
}
