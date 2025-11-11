<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vacuna>
 */
class VacunaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Tipos de dosis comunes
        $dosisTipos = ['Única', 'Doble', 'Refuerzo Anual', 'Esquema de 3'];

        return [
            'nombre' => $this->faker->unique()->word() . ' ' . $this->faker->randomElement(['Vax', 'Protect', 'Shield', 'Guard']),
            'descripcion' => $this->faker->paragraph(2),
            'dosis' => $this->faker->randomElement($dosisTipos),
        ];
    }
}
