<?php

namespace Database\Factories;

use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Animal>
 */
class AnimalFactory extends Factory
{
    protected $model = Animal::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->firstName,
            'codigo' => $this->faker->unique()->numberBetween(1000, 9999),
            'precio' => $this->faker->numberBetween(50000, 300000),
            'imagen' => null, // opcional
            'registro' => $this->faker->optional()->bothify('REG-####'),
            'guia_sanitaria' => $this->faker->optional()->bothify('GS-####'),
            'sexo' => $this->faker->randomElement(['M', 'F', 'NA']),
            'color' => $this->faker->safeColorName(),
            'marcas' => $this->faker->optional()->sentence(),
            'fecha_nacimiento' => $this->faker->dateTimeBetween('-5 years', 'now'),
            'estado' => true,
            // Relaciones (dejamos nulas para evitar dependencias circulares)
            'padre1_id' => null,
            'padre2_id' => null,
            'venta_id' => null,
        ];
    }
}
