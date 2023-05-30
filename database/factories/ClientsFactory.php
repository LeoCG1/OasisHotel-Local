<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $apellido1 = fake()->lastName();
        $apellido2 = fake()->lastName();
        return [
            'dni' => fake()->numberBetween(10000000, 99999999) . fake()->randomLetter(),
            'nombre' => fake()->firstName(),
            'apellidos' => substr($apellido1,strpos($apellido2, " ")),
            'direccion' => fake()->address(),
            'telefono' => fake()->phoneNumber(),
            'email' => fake()->unique()->safeEmail(),
            'tipo_cliente' => fake()->randomElement(['Privado', 'Agencia']),
            'user_id' => null,
            'room_id' => null
        ];
    }
}
