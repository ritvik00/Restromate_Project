<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TaxSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tax')->insert([
            'name' => 'Gst',
            'percentage' => '12',
            'verified' => 'active ',
            'user_id' => '1',
            'created_at' => now(),
            
        ]);

        DB::table('tax')->insert([
            'name' => 'CGst',
            'percentage' => '10',
            'verified' => 'active ',
            'user_id' => '1',
            'created_at' => now(),
            
        ]);
    }
}
