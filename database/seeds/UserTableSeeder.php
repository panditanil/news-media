<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'name'=>'user',
            'email'=>'user@user.com',
            'password'=>bcrypt('123456789'),
            'role'=> 'user',
            'profile'=> ''
        ];
        DB::table('users')->insert($data);
    }
}
