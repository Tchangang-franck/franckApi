<?php

namespace Database\Seeders;

use App\Models\User;
Use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminRole=Role::create([
            'name'=>'admin',
            'guard_name'=>'web',
        ]);
        $userRole=Role::create([
            'name'=>'user',
            'guard_name'=>'web',
        ]);

        $admin=User::create([
            'name'=>'admin',
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('password'),
        ]);
        $admin->assignRole('admin');
    }
}
