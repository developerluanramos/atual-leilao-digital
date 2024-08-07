<?php

namespace Database\Factories;

use App\Models\Leiloeiro;
use App\Models\Promotor;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Leilao>
 */
class LeilaoFactory extends Factory
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
            'denominacao' => $this->faker->text(150),
            'descricao' => $this->faker->text(150),
            'local' => $this->faker->address(),
            'cep' => $this->faker->postcode(),
            'uf' => 'PA',
            'cidade' => $this->faker->city(),
            'aberto_em' => $this->faker->dateTimeBetween('-30 days', 'now'),
            'fechado_em' => $this->faker->dateTimeBetween('now', '+3 days'),
            'prelance_aberto_em' => $this->faker->dateTimeBetween('-35days', '-31 days'),
            'prelance_fechado_em' => $this->faker->dateTimeBetween('-35days', '-31 days'),
            'promotor_uuid' => Promotor::inRandomOrder()->first()->uuid,
            'leiloeiro_uuid' => Leiloeiro::inRandomOrder()->first()->uuid,
        ];
    }
}
