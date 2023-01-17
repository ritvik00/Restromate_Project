<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FeaturedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('featured')->insert([
            'title' => 'Diwali',
            'description' => '1fdsfdfdfd',
            'category' => '1,2',
            'product_type' => 'foodonoffer',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

        DB::table('featured')->insert([
            'title' => 'Demo',
            'description' => '1fdsf dfdsdsds  sdfdfd',
            'category' => '1,2',
            'product_type' => 'foodonoffer',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);
    }
}
