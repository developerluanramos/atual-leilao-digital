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
            'descricao' => $this->faker->text(150),
            'leilao_uuid' => Leilao::inRandomOrder()->first()->uuid,
            'quantidade'  => $this->faker->numberBetween(1, 3), // -- desconsiderar
            'quantidade_macho'  => $this->faker->numberBetween(1, 3), // -- desconsiderar
            'quantidade_femea'  => $this->faker->numberBetween(1, 3), // -- desconsiderar
            'quantidade_outro'  => $this->faker->numberBetween(1, 3), // -- desconsiderar
            'plano_pagamento_uuid' => $planoPagamento->uuid,
            'valor_estimado' => $this->faker->numerify('#####.##'),
            'valor_minimo_prelance' => $this->faker->numerify('##.##'),
            'incide_comissao_compra' => $this->faker->randomElement([true, false]),
            'incide_comissao_venda' => $this->faker->randomElement([true, false]),
            'multiplicador' => $this->faker->randomElement([null, 1]),
            'observacoes' => $this->faker->text(150),
            'numero' => 1
        ];
    }
}
