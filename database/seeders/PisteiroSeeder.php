<?php

namespace Database\Seeders;

use App\Models\Pisteiro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PisteiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pisteiro::factory(50)->create();
    }
}
