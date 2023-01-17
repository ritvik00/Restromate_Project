<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TickettypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tickettype')->insert([
            'ticket_name' => 'Facebook',
            'createdby' => 0,
            'modifiedby' => 0,
            'created_at' => now(),
        ]);

        DB::table('tickettype')->insert([
            'ticket_name' => 'Twitter',
            'createdby' => 0,
            'modifiedby' => 0,
            'created_at' => now(),
        ]);
    }
}
