<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Ad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);

        Ad::factory()->create([
            'title' => 'Annonce de test',
            'description' => 'Description de l\'annonce de test',
            'price' => 100,
            'category' => 'Catégorie de test',
            'condition' => 'Neuf',
            'user_id' => 1,
        ]);
    }
}
