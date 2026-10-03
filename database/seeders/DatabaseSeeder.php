<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::create([
            'username' => 'testuser',
            'password' => bcrypt('password'),
            'full_name' => 'Test User',
            'phone' => '0700000000',
            'role' => 'customer',
        ]);
    }
}