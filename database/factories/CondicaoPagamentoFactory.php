<?php

namespace Database\Factories;

use App\Models\PlanoPagamento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CondicaoPagamento>
 */
class CondicaoPagamentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'uuid' => $this->faker->uuid(),
            'descricao' => $this->faker->word(),
            'repeticoes' => $this->faker->numberBetween(1, 2),
            'qtd_parcelas' => $this->faker->randomElement([15, 20, 25]),
            'percentual_comissao_vendedor' => 5,
            'percentual_comissao_comprador' => 2,
            'incide_comissao_comprador' => true,
            'incide_comissao_vendedor' => false,
            'plano_pagamento_uuid' => PlanoPagamento::inRandomOrder()->first()->uuid,
        ];
    }
}
