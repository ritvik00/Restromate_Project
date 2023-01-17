<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role_name' => 'SuperAdmin',
            'is_active' => '1',
            'user_id' => '1',
            'created_at' => now(),
            
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Admin',
            'is_active' => '1',
            'user_id' => '2',
            'created_at' => now(),
            
        ]);
        DB::table('roles')->insert([
            'role_name' => 'Restaurants',
            'is_active' => '1',
            'user_id' => '3',
            'created_at' => now(),
            
        ]);
        DB::table('roles')->insert([
            'role_name' => 'DeliveryBoy',
            'is_active' => '1',
            'user_id' => '4',
            'created_at' => now(),
            
        ]);
    }
}
