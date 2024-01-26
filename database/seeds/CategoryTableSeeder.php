<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            'name' =>'Tech',
            'status' => '1',
       ];
       DB::table('categories')->insert($data);
    }
}
