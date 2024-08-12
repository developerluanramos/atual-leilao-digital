<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Lance;
use App\Models\Lote;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Lance_cliente>
 */
class LanceClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lance = Lance::inRandomOrder()->first();
        $cliente = Cliente::inRandomOrder()->first();

        return [
            'uuid' => fake()->uuid(),
            'leilao_uuid' => $lance->leilao_uuid,
            'lote_uuid' => $lance->lote_uuid,
            'lance_uuid' => $lance->uuid,
            'cliente_uuid' => $cliente->uuid,
            'cota_percentual' => 100,
            'cota_real' => fake()->randomFloat()
        ];
    }
}
