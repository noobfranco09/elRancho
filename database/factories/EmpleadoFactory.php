<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
 */
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'name' => $this->faker->name(),
            'fecha_nacimiento' => $this->faker->date('Y-m-d', '2000-01-01'),
            'telefono' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'direccion' => $this->faker->address(),
            'estado' => $this->faker->randomElement(['activo', 'inactivo']),
            'rol_id' => 1, // Puedes cambiarlo o asignarlo dinámicamente
            'password' => Hash::make('123456'), // Contraseña por defecto
        ];
    }
}
