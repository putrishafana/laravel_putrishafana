<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::insert([
            [
                'name' => 'Superadmin',
                'username' => 'admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('admin123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Putri Nadila',
                'username' => 'putri',
                'email' => 'putri@example.com',
                'password' => Hash::make('putri123'),
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}