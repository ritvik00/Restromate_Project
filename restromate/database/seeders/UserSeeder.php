<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('users')->insert([
            'user_name' => 'superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('123456789'),
            'full_name' => 'admin test testing',
            'address' => 'admin address',
            'phoneno' => '1234567890',
            'role_id' => '1',
            'photo' => 'D3FAe_Screenshot_1.png',
            'is_active' => '1',
            'verified' => 'inactive',
            'createdby' => 0,
            'created_at' => now(),
        ]);

        DB::table('users')->insert([
            'user_name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin@123'),
            'full_name' => 'admin test testing',
            'address' => 'admin address',
            'photo' => 'D3FAe_Screenshot_1.png',
            'phoneno' => '1234567890',
            'role_id' => '2',
            'is_active' => '1',
            'verified' => 'inactive',
            'createdby' => 0,
            'created_at' => now(),
        ]);

       
    }
}
