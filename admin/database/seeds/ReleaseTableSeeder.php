<?php

use Illuminate\Database\Seeder;

class ReleaseTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('release_numbers')->insert([
				'name'               => '2017年12月26日号',
				'image_release_path' => 'imageDefault/2.jpg',
				'image_header_path'  => 'imageDefault/banner2.png',
				'is_deleted'         => false
      ]);
      DB::table('release_numbers')->insert([
				'name'               => '2016年10月14日号',
				'image_release_path' => 'imageDefault/1.jpg',
				'image_header_path'  => 'imageDefault/banner1.jpg',
				'is_deleted'         => false
      ]);
      DB::table('release_numbers')->insert([
				'name'               => '2017年12月31日号',
				'image_release_path' => 'imageDefault/6.jpg',
				'image_header_path'  => 'imageDefault/banner6.jpg',
				'is_deleted'         => false
      ]);
      DB::table('release_numbers')->insert([
				'name'               => '2017年12月31日号',
				'image_release_path' => 'imageDefault/ozawa.jpg',
				'image_header_path'  => 'imageDefault/ozawabanner.jpg',
				'is_deleted'         => false
      ]);
    }
}
