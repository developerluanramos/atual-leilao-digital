<?php

namespace Database\Seeders;

use App\Models\CondicaoPagamento;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CondicaoPagamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CondicaoPagamento::factory(2)->create();
    }
}
