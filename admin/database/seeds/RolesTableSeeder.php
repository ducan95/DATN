<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name'      => 'Super Administrator',
            'role_code' => 's_admin',
        ]);

        DB::table('roles')->insert([
            'name'      => 'Admin',
            'role_code' => 'admin',
        ]);

        DB::table('roles')->insert([
            'name'      => 'Editor',
            'role_code' => 'editor',
        ]);

        DB::table('roles')->insert([
            'name'      => 'Contributor',
            'role_code' => 'user',
        ]);
    }
}
