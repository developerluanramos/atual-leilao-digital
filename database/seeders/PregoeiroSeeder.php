<?php

namespace Database\Seeders;

use App\Models\Pregoeiro;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PregoeiroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pregoeiro::factory(10)->create();
    }
}
