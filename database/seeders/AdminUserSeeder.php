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
        // Cek apakah user admin sudah ada
        $adminExists = User::where('email', 'admin@example.com')->first();
        
        if (!$adminExists) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'role' => 'admin'
            ]);
            
            echo "Admin user created successfully!\n";
            echo "Email: admin@example.com\n";
            echo "Password: password\n";
        } else {
            echo "Admin user already exists.\n";
        }
    }
}
