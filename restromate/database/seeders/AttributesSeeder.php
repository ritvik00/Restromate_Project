<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AttributesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attributes')->insert([
            'name' => 'Diwali',
            'values' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

        DB::table('attributes')->insert([
            'name' => 'Demo',
            'values' => '2',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

        DB::table('attributes')->insert([
            'name' => 'Attr',
            'values' => '3',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

    }
}
