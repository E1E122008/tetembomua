<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create admin user
        User::updateOrCreate(
            ['email' => 'admin@desatetembomua.com'],
            [
                'name' => 'Administrator',
                'email' => 'admin@desatetembomua.com',
                'password' => Hash::make('password123'),
                'role' => 'admin',
                'status' => 'active',
            ]
        );

        // Create super admin user
        User::updateOrCreate(
            ['email' => 'tetembomua@gmail.com'],
            [
                'name' => 'Super Administrator',
                'email' => 'tetembomua@gmail.com',
                'password' => Hash::make('tetembomua123'),
                'role' => 'admin',
                'status' => 'active',
            ]
        );

        // Create test user
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'email' => 'test@example.com',
                'password' => Hash::make('password'),
                'role' => 'viewer',
                'status' => 'active',
            ]
        );

        $this->command->info('Admin users created successfully!');
        $this->command->info('Email: admin@desatetembomua.com | Password: password123');
        $this->command->info('Email: superadmin@desatetembomua.com | Password: superadmin123');
    }
}
