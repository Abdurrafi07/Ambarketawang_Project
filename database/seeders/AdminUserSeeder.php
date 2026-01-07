<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    public function run(): void
    {
        // Cek apakah admin sudah ada
        $adminEmail = 'admin@example.com';

        if (!User::where('email', $adminEmail)->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => $adminEmail,
                'email_verified_at' => now(),
                'password' => Hash::make('password123'), // ganti sesuai kebutuhan
                'remember_token' => Str::random(10),
            ]);

            $this->command->info("Admin user created: {$adminEmail} / password123");
        } else {
            $this->command->info("Admin user already exists: {$adminEmail}");
        }
    }
}
