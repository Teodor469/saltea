<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user if it doesn't exist
        User::firstOrCreate(
            ['email' => 'teodor.todorov469@gmail.com'],
            [
                'name' => 'Admin User',
                'role' => 'admin',
                'email_verified_at' => now(),
                'password' => 'password',
            ]
        );
    }
}
