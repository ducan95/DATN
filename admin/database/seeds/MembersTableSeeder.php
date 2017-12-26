<?php

use Illuminate\Database\Seeder;

class MembersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('members')->insert(
            [
                'id_member'  		=> '1' ,
                'email' 			=> 'huyentranghathi@gmail.com' ,
                'password' 			=> bcrypt('123'),
                'birthday'   		=> '1996-10-24' ,
                'gender'  			=> false ,
                'is_receive_email'	=> true,
                'status'			=> true,
                'is_deleted' 		=> false,
            ]
        );
    }
}
