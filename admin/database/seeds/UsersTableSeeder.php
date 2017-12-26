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
                'id_user'    => '1' ,
                'username'   => 'Super Administrator' ,
                'email'      => 'admin@gmail.com' ,
                'status'     => true ,
                'role_code'  => 's_admin' ,
                'password'   => bcrypt('123'),
                'is_deleted' => false
            ]
        );
    }
}
