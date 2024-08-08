<?php

namespace Database\Seeders;

use App\Models\PrelanceConfig;
use Illuminate\Database\Seeder;

class PrelanceConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PrelanceConfig::factory(3)->create();
    }
}
