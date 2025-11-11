<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Alimento>
 */
class AlimentoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Posibles unidades de medida
        $unidades = ['Kg', 'Litros', 'Unidades', 'Gramos', 'Porciones'];

        return [
            'nombre' => $this->faker->unique()->word() . ' ' . $this->faker->randomElement(['Fresco', 'Congelado', 'Enlatado', 'Orgánico']),
            'observaciones' => $this->faker->optional()->paragraph(1),
            'precio' => $this->faker->optional()->numberBetween(1000, 50000), // Precio en la moneda local (ej. pesos)
            'unidad' => $this->faker->optional()->randomElement($unidades),
            'cantidad' => $this->faker->optional()->numberBetween(1, 100),
            'estado' => $this->faker->boolean(90), // 90% de probabilidad de ser true (activo)
        ];
    }
}
