<?php

namespace Database\Factories;

use App\Models\Especie;
use App\Models\Lote;
use App\Models\Raca;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LoteItem>
 */
class LoteItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $lote = Lote::inRandomOrder()->first();

        return [
            'uuid' => $this->faker->uuid(),
            'lote_uuid' => $lote->uuid,
            'descricao' => $this->faker->text(100),
            'quantidade'  => $this->faker->numberBetween(1, 3),
            'quantidade_macho'  => $this->faker->numberBetween(1, 3),
            'quantidade_femea'  => $this->faker->numberBetween(1, 3),
            'quantidade_outros'  => $this->faker->numberBetween(1, 3),
            'raca_uuid' => Raca::inRandomOrder()->first()->uuid,
            'especie_uuid' => Especie::inRandomOrder()->first()->uuid,
            'valor' => $this->faker->numerify('#####.##'),
            'incide_comissao_compra' => $this->faker->randomElement([true, false]),
            'incide_comissao_venda' => $this->faker->randomElement([true, false]),
        ];
    }
}
