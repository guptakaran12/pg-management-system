<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => 'superadmin'], 
            [
                'full_name' => 'Super Admin',
                'email' => 'admin@pgsystem.com',
                'phone_number' => '9999999999',
                'gender' => 'Male',
                'dob' => '1990-01-01',
                'join_date' => now(),
                'current_address' => 'Head Office',
                'permanent_address' => 'Head Office',
                'role' => 'Admin',
                'password' => Hash::make('Admin@123'), 
            ]
        );
    }
}
