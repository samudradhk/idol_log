<?php

namespace Database\Seeders;

use App\Models\IdolActivity;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed admin user
        User::create([
            'name'     => 'admin',
            'email'    => 'admin@example.com',
            'password' => Hash::make('password'),
        ]);

        // Seed 45 idol activities
        IdolActivity::factory(45)->create();
    }
}
