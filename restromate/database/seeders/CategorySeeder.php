<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'name' => 'Pizza',
            'image' => 'pizza.jpg',
            'banner_image' => 'pizza.jpg',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

        DB::table('category')->insert([
            'name' => 'Punjabi',
            'image' => 'punjabi.jpg',
            'banner_image' => 'punjabi.jpg',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

        DB::table('category')->insert([
            'name' => 'South Indian',
            'image' => 'sauthindian.jpg',
            'banner_image' => 'sauthindian.jpg',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);
    }
}
