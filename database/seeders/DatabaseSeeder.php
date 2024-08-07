<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            ClienteSeeder::class,
            ContatoSeeder::class,
            PromotorSeeder::class,
            EspecieSeeder::class,
            RacaSeeder::class,
            LeiloeiroSeeder::class,
            PisteiroSeeder::class,
            PlanoPagamentoSeeder::class,
            CondicaoPagamentoSeeder::class,
            LeilaoSeeder::class,
            LoteSeeder::class,
            LoteItemSeeder::class,
            CompraSeeder::class,
            VendaSeeder::class,
            ParcelaSeeder::class,
            PrelanceConfigSeeder::class
        ]);
    }
}
