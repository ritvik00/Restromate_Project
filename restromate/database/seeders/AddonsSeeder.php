<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AddonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('addons')->insert([
            'title' => 'Pizza',
            'image' => 'pizza.jpg',
            'description' => 'thid id seeder data',
            'calories' => '18cal',
            'price' => '18',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

        DB::table('addons')->insert([
            'title' => 'ice_cream',
            'image' => 'icecream.jpg',
            'description' => 'thid id seeder data',
            'calories' => '18cal',
            'price' => '18',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);
    }
}
