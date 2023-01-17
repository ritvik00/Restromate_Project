<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class FirebaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('firebase')->insert([
            'apikey' => 'Restromate',
            'user_id' => '1',
            'authdomain' => '1234560789',
            'databaseurl' => '1',
            'projectid' => 'Demo@gmail.com',
            'storagebucket' => '6pSnH_1671608777g',
            'messagingsenderid' => '6pSnH_1671608777.png',
            'appid'=>'sfsf12220dfsd',
            'measurementid' => 'sdsad3555ef',
            'created_at' => now(),
        ]);
        
    }
}
