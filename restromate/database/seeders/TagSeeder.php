<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tag')->insert([
            'name' => 'Pizza',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

        DB::table('tag')->insert([
            'name' => 'Desert',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

        DB::table('tag')->insert([
            'name' => 'Veg',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);
    }
}
