<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $this->call('RolesTableSeeder');
        $this->call('PostTableSeeder');
        $this->call('ImagesTableSeeder');
        $this->call('UsersTableSeeder');
        $this->call('ReleaseTableSeeder');
        $this->call('CategoryTableSeeder');
        $this->call('MembersTableSeeder');
    }
}
