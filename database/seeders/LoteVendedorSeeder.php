<?php

namespace Database\Seeders;

use App\Models\LoteVendedor;
use Illuminate\Database\Seeder;

class LoteVendedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LoteVendedor::factory(20)->create();
    }
}
