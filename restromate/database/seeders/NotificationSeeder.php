<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class NotificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('notification')->insert([
            'type' => 'Category',
            'category_id' => '1',
            'image' => '5r8qJ_1672979334.png',
            'title' => 'inactive',
            'message' => '2022-12-21',
            'user_id' => '1',
            'created_at' => now(),
            
        ]);
    }
}
