<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SystemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $data=[
        'name'=>'News and Media Portals',
        'email'=>'news@gmail.com',
        'phone'=>'9814',
        'address'=>'Birgunj',
        'date'=>'2024',
        'slogan'=>'Informing Today, Shaping Tomorrow: Where News Meets Insight.',
        'logo'=>'logo.jpeg',
       ];
       DB::table('systems')->insert($data);
    }
}
