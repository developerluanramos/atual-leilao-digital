<?php

namespace Database\Factories;

use App\Models\Cliente;
use App\Models\Lote;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoteVendedor>
 */
class LoteVendedorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "lote_uuid" => Lote::inRandomOrder()->first()->uuid,
            "cliente_uuid" => Cliente::inRandomOrder()->first()->uuid,
            "percentual_cota" => 100
        ];
    }
}
