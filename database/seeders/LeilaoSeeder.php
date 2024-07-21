<?php

namespace Database\Seeders;

use App\Models\Leilao;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LeilaoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leilao::factory(1)->create();
    }
}
