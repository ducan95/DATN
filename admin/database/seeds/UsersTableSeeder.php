<?php

use Illuminate\Database\Seeder;
use App\Roles;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $roles = Roles::all();
        $i=1;
        foreach ($roles as $role) {
            $i++;
            DB::table('users')->insert(
            [
                'username'   => 'User'.$i ,
                'email'      => 'admin'.$i.'@gmail.com' ,
                'status'     => true ,
                'role_code'  => $role->role_code,
                'password'   => bcrypt('123456'),
                'is_deleted' => false
            ]);
        }
    }
}
