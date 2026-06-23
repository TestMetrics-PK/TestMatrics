<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        if (!User::where('email', 'admin@testmatrics.local')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@testmatrics.local',
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]);
        }
    }
}
