<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        User::create([
            'name' => 'Admin',
            'email' => 'kuakui1q@gmail.com',
            'password' => Hash::make('admin#1234'),
            'role' => 'admin',
            'email_verified_at' => now(),
        ]);
    }
}