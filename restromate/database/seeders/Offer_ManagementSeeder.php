<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Offer_ManagementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('offers__management')->insert([
            'type' => 'Diwali',
            'type_id' => '1',
            'image' => '0nzRW_1671540597.png',
            'banner_image' => '0nzRW_1671540597.png',
            'user_id' => '1',
            'verified' => 'active ',
            'created_at' => now(),
            
        ]);

        DB::table('offers__management')->insert([
            'type' => 'Holi',
            'type_id' => '2',
            'image' => '0nzRW_1671540597.png',
            'banner_image' => '0nzRW_1671540597.png',
            'user_id' => '1',
            'verified' => 'active',
            'created_at' => now(),
            
        ]);
    }
}
