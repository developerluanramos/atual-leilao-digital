<?php

namespace Database\Factories;

use App\Models\CondicaoPagamento;
use App\Models\Especie;
use App\Models\Leilao;
use App\Models\PlanoPagamento;
use App\Models\Raca;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lote>
 */
class LoteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $planoPagamento = PlanoPagamento::inRandomOrder()->first();

        return [
            'uuid' => $this->faker->uuid(),
            'descricao' => $this->faker->word(),
            'leilao_uuid' => Leilao::inRandomOrder()->first()->uuid,
            'quantidade'  => $this->faker->numberBetween(1, 3),
            'quantidade_macho'  => $this->faker->numberBetween(1, 3),
            'quantidade_femea'  => $this->faker->numberBetween(1, 3),
            'quantidade_outro'  => $this->faker->numberBetween(1, 3),
            'plano_pagamento_uuid' => $planoPagamento->uuid,
            'valor_estimado' => $this->faker->numerify('#####.##'),
            'incide_comissao_compra' => $this->faker->randomElement([true, false]),
            'incide_comissao_venda' => $this->faker->randomElement([true, false]),
        ];
    }
}
