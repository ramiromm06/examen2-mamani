<?php

namespace Database\Factories;

use App\Models\Producto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Producto>
 */
class ProductoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_id'  => \App\Models\Categoria::inRandomOrder()->first()->id,
            'nombre'        => fake()->words(3, true),
            'sku'           => strtoupper(fake()->unique()->bothify('??-####')),
            'precio'        => fake()->randomFloat(2, 5, 500),
            'stock'         => fake()->numberBetween(0, 100),
            'disponible'    => true,
        ];
    }
}
