<?php

namespace Database\Seeders;

use App\Models\LanceCliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LanceClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LanceCliente::factory(200)->create();
    }
}
