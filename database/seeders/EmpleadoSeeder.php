<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Empleado;
use Illuminate\Support\Facades\Hash;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Empleado::updateOrCreate(
            ['email' => 'admin@empresa.com'], // evita duplicados
            [
                'name' => 'Administrador',
                'fecha_nacimiento' => '1990-01-01', // formato YYYY-MM-DD (válido para campo date)
                'telefono' => '3001234567',
                'direccion' => 'Calle 123, Ciudad',
                'estado' => true, // tinyint(1) = 1 (activo)
                'rol_id' => 1, // Asegúrate de tener un rol con id = 1 (Administrador)
                'password' => Hash::make('admin123'),
            ]
        );
    }
}
