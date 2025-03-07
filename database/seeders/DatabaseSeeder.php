<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'nome' => 'Prefeitura',
            'email' => 'test@example.com',
        ]);
        
        User::factory()->create([
            'nome' => 'Morador',
            'email' => 'morador@example.com',
            'tipo' => 'morador',
        ]);
        User::factory()->create([
            'nome' => 'Morador2',
            'email' => 'morador2@example.com',
            'tipo' => 'morador',
            'rua' => 'quarenta e um',
            'bairro' => 'Caetés',
        ]);
    }
}