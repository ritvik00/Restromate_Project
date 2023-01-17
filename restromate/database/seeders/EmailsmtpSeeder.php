<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EmailsmtpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('emailsmtp')->insert([
            'email' => 'Demo@gmail.com',
            'user_id' => '1',
            'password' => '1234560789',
            'smtphost' => 'a2hosting',
            'smtpport' => '21',
            'contenttype' => 'html',
            'smtpencryption' => '6pSnH_1671608777=ammsss12dsdjn12',
            'created_at' => now(),
        ]);
    }
}
