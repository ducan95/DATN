<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	'name' => 'Sport',
        	'slug' => 'Sport',
        	'global_status' =>true,
        	'menu_status' => false,
        	'id_category_parent' => 0,
        	'is_deleted'=>false,
        ]);
    }
}
