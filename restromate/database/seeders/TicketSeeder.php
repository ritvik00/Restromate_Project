<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TicketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ticket')->insert([
            'ticket_name' => '1',
            'subject' => 'Facebook',
            'email' => 'email@gmail.com',
            'description' => 'Facebook',
            'status' => 'open',
            'user_id' => 1,
            'created_at' => now(),
        ]);

    }
}
