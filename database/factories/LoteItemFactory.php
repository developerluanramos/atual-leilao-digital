<?php

namespace Database\Factories;

use App\Enums\GeneroLoteItemEnum;
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
            'genero' => GeneroLoteItemEnum::getRandomValue(),
            'raca_uuid' => Raca::inRandomOrder()->first()->uuid,
            'especie_uuid' => Especie::inRandomOrder()->first()->uuid,
            'valor_estimado' => $this->faker->numerify('#####.##'),
            'observacoes' => $this->faker->text(100),
            'codigo_identificacao' => $this->faker->numerify('######'),
            'cor' => 'Branco',
            'castrado' => random_int(0, 1)
        ];
    }
}
