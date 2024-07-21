<?php

namespace Database\Seeders;

use App\Models\Leiloeiro;
use Illuminate\Database\Seeder;

class LeiloeiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Leiloeiro::factory(10)->create();
    }
}
