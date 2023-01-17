<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class CreateRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'id' => 0,
            'role_name' => 'SuperAdmin',
            'createdby' => 1
        ]);
        
        Role::create([
            'id' => 1,
            'role_name' => 'Admin',
            'createdby' => 1
        ]);

        Role::create([
            'id' => 2,
            'role_name' => 'Sub Admin',
            'createdby' => 1
        ]);

        Role::create([
            'id' => 3,
            'role_name' => 'Company',
            'createdby' => 1
        ]);

        Role::create([
            'id' => 4,
            'role_name' => 'Employee',
            'createdby' => 1
        ]);


    }
}
