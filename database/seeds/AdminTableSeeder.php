<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data=[
            'name'=>'admin',
            'email'=>'admin@admin.com',
            'password'=>bcrypt('123456789'),
            'role'=> 'admin',
            'profile'=> ''
        ];
        DB::table('users')->insert($data);
    }
}
