<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CmsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cms')->insert([
            'title' => 'demo',
            'content' => 'demo@gmail.com',
            'featuredimage' => '0nzRW_1671540597.png',
            'meta_title' => '1234560789',
            'meta_dec'=>'Kfc',
            'meta_key' => '2022-12-21 ',
            'verified' => 'active',
            'created_at' => now(),
        ]);

        DB::table('cms')->insert([
            'title' => 'demo12',
            'content' => 'demo12@gmail.com',
            'featuredimage' => '0nzRW_1671540597.png',
            'meta_title' => '1234560789',
            'meta_dec'=>'Kfc',
            'meta_key' => '2022-12-21 ',
            'verified' => 'active',
            'created_at' => now(),
        ]);
    }
}
