<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sliders')->insert([
            'type' => 'category',
            'category_id' => '2',
            'image' => '0nzRW_1671540597.png',
            'createdby' => 0,
            'modifiedby' => 0,
            'created_at' => now(),
            
        ]);


        DB::table('sliders')->insert([
            'type' => 'product',
            'product_id' => '1',
            'image' => 'KOcms_1671542243.png',
            'createdby' => 0,
            'modifiedby' => 0,
            'created_at' => now(),
            
        ]);
    
        
    }
}
