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
                'id_member'  		=> '3' ,
                'email' 			=> 'huyentranghathi3@gmail.com' ,
                'password' 			=> bcrypt('123'),
                'birthday'   		=> '1996-10-24' ,
                'gender'  			=> false ,
                'is_receive_email'	=> true,
                'member_plan_code'	=> 'free',
                'is_deleted' 		=> false,
                'is_active'         => true
            ]
        );
        DB::table('members')->insert(
            [
                'id_member'  		=> '2' ,
                'email' 			=> 'huyentranghathi2@gmail.com' ,
                'password' 			=> bcrypt('123'),
                'birthday'   		=> '1996-10-24' ,
                'gender'  			=> false ,
                'is_receive_email'	=> true,
                'member_plan_code'	=> 'free',
                'is_deleted' 		=> false,
                'is_active'         => false
            ]
        );
    }
}


                

