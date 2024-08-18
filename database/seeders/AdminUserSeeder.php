<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Seed the application's database with an admin user.
     *
     * @return void
     */
    public function run()
    {
        // Insert an admin user into the 'users' table
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@example.com',
            'password' => bcrypt('0000'), // Encrypt the password
            'role' => 'admin', // Assign the 'admin' role
        ]);
    }
}

