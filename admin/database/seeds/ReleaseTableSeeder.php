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
				'image_release_path' => 'imageDefault/cover2018-04-23-1.jpg'
      ]);
      DB::table('release_numbers')->insert([
				'name'               => '2016年10月14日号',
				'image_release_path' => 'imageDefault/cover2018-04-23-2.jpg'
      ]);
      DB::table('release_numbers')->insert([
				'name'               => '2017年12月31日号',
				'image_release_path' => 'imageDefault/cover2018-04-23-3.jpg'
      ]);
      DB::table('release_numbers')->insert([
				'name'               => '2017年12月31日号',
				'image_release_path' => 'imageDefault/cover2018-04-23-4.jpg'
      ]);
    }
}
