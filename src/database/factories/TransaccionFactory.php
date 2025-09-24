<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Grupo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaccion>
 */
class TransaccionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'descripcion' => fake()->sentence(),
            'monto' => fake()->randomFloat(5, 1000, 100000),
            'fecha_transaccion' => fake()->date(),
            'categoria_id' => Categoria::factory(),
            'grupo_id' => Grupo::factory(),
        ];
    }
}
