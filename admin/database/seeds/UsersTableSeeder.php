<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert(
            [
                'id_user'  => '2' ,
                'username' => 'Quyen Luu' ,
                'email'    => 'b@gmail.com' ,
                'status'   => '1' ,
                'id_role'  => '1' ,
                'password' => bcrypt('123'),
                'is_deleted' => '1'
            ]
        );
    }
}
