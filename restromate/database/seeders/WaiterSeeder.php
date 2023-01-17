<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class WaiterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('waiter')->insert([
            'name' => 'demo',
            'email' => 'demo@gmail.com',
            'image' => '0nzRW_1671540597.png',
            'phone' => '1234560789',
            'restaurant_name'=>'Kfc',
            'start_date' => '2022-12-21 ',
            'verified' => 'inactive',
            'created_at' => now(),
        ]);

        DB::table('waiter')->insert([
            'name' => 'demo1',
            'email' => 'demo1@gmail.com',
            'image' => '0nzRW_1671540597.png',
            'phone' => '1234560798',
            'restaurant_name'=>'Dominos',
            'start_date' => '2022-12-21 ',
            'verified' => 'inactive',
            'created_at' => now(),
        ]);
    }
}
