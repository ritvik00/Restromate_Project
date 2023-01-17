<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PromocodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('promocode')->insert([
            'promocode' => 'Diwali',
            'message' => 'Diwali Offer Promocode',
            'image' => '0nzRW_1671540597.png',
            'verified' => 'inactive',
            'start_date' => '2022-12-21 ',
            'end_date' => '2022-12-21 ',
            'discount' => '250',
            'discount_type' => 'amount',
            'createdby' => 0,
            'modifiedby' => 0,
            'created_at' => now(),
            
        ]);

        DB::table('promocode')->insert([
            'promocode' => 'NewYear',
            'message' => 'NewYear Offer Promocode',
            'image' => '0nzRW_1671540597.png',
            'verified' => 'inactive',
            'start_date' => '2022-12-21 ',
            'end_date' => '2022-12-21 ',
            'discount' => '250',
            'discount_type' => 'amount',
            'createdby' => 0,
            'modifiedby' => 0,
            'created_at' => now(),
            
        ]);
    }
}
