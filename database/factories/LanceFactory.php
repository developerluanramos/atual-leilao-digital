<?php

namespace Database\Factories;

use App\Models\Lote;
use App\Models\PrelanceConfig;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lance>
 */
class LanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lote = Lote::inRandomOrder()->first();
        $preLanceConfig = PrelanceConfig::inRandomOrder()->first();

        return [
            'uuid' => fake()->uuid(),
            'leilao_uuid' => $lote->leilao_uuid,
            'lote_uuid' => $lote->uuid,
            'prelance_config_uuid' => $preLanceConfig->uuid,
            'plano_pagamento_uuid' => $lote->plano_pagamento_uuid,
            'realizado_em' => fake()->date(),
            'valor' => $this->faker->numberBetween(100, 500)
        ];
    }
}
