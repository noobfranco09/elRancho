<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Rol;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            ['nombre' => 'Administrador', 'estado' => 1],
            ['nombre' => 'Veterinario', 'estado' => 1],
            ['nombre' => 'Recepcionista', 'estado' => 1],
            ['nombre' => 'Auxiliar', 'estado' => 1],
            ['nombre' => 'Sin rol', 'estado' => 1],
        ];

        foreach ($roles as $rol) {
            Rol::updateOrCreate(
                ['nombre' => $rol['nombre']],
                ['estado' => $rol['estado']]
            );
        }
    }
}
