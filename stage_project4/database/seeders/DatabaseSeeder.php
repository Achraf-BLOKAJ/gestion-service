<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Créer un utilisateur admin spécifique
        User::factory()->create([
            'name' => 'admin User',
            'email' => 'Admin@example.com',
            'password' => Hash::make('Admin@example.com'),
            'role' => 'admin',
            'phone' => '0623458880',
            'cin' => 'AB123465',
        ]);

        // Créer 10 utilisateurs aléatoires
        User::factory(1)->create();
    }
}
