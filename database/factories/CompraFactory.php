<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Lote;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Compra>
 */
class CompraFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lote = Lote::inRandomOrder()->first();
        $leilao = $lote->leilao()->first();
        
        return [
            'uuid' => $this->faker->uuid,
            'leilao_uuid' => $leilao->uuid,
            'lote_uuid' => $lote->uuid,
            // 'cliente_uuid' => $cliente->uuid,
            // 'plano_pagamento_uuid',
            // 'valor',
            // 'valor_comissao_vendedor',
            // 'valor_comissao_comprador',
        ];
    }
}
