<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'heading'=>'The Impact of a Reliable Paper Writer Service on Your Success Read More',
            'subheading'=>'Impact of a Reliable Paper Writer',
            'description'=>'Impact of a Reliable Paper Writer The Impact of a Reliable Paper Writer Service on Your Success Read More',
            'status'=> '1',
            'image'=>'news.png',
            'link'=>'https://www.youtube.com/watch?v=Nq2wYlWFucg',
            'category_id'=>'1'
       ];
       DB::table('newstable')->insert($data);
    }
}
