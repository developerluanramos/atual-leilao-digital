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
        $condicaoPagamento = CondicaoPagamento::where('plano_pagamento_uuid', $planoPagamento->uuid)->first();
        return [
            'uuid' => $this->faker->uuid(),
            'leilao_uuid' => Leilao::inRandomOrder()->first()->uuid,
            'plano_pagamento_uuid' => $planoPagamento->uuid,
            'condicao_pagamento_uuid' => $condicaoPagamento->uuid,
            'raca_uuid' => Raca::inRandomOrder()->first()->uuid,
            'especie_uuid' => Especie::inRandomOrder()->first()->uuid,
            'valor' => $this->faker->numerify('#####.##'),
            'incide_comissao_compra' => $this->faker->randomElement([true, false]),
            'incide_comissao_venda' => $this->faker->randomElement([true, false]),
        ];
    }
}
