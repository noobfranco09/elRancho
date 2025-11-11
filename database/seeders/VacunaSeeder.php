<?php

namespace Database\Seeders;

use App\Models\Vacuna;
use Illuminate\Database\Seeder;

class VacunaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Vacuna::factory()->count(15)->create();
    }
}
