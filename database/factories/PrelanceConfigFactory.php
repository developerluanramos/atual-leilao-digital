<?php

namespace Database\Factories;

use App\Models\Leilao;
use App\Models\PlanoPagamento;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrelanceConfig>
 */
class PrelanceConfigFactory extends Factory
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
            'data' => $this->faker->date('Y-m-d'),
            'cor' => $this->faker->hexColor(),
            'leilao_uuid' => Leilao::inRandomOrder()->first()->uuid,
            'plano_pagamento_uuid' => PlanoPagamento::inRandomOrder()->first()->uuid,
            'valor_estimado' => 4050.00,
            'valor_minimo' => 100,
            'valor_progressao' => 50.00,
            'percentual_progressao' => 5.00
        ];
    }
}
