<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            FornecedorSeeder::class,
            CargoSeeder::class,
            UserSeeder::class,
            EquipeSeeder::class,
            PostoTrabalhoSeeder::class,
            SetorSeeder::class,
            DepartamentoSeeder::class
        ]);
    }
}
