<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Staff>
 */
class StaffFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $dias = rand(1, 30);
        $meses = rand(1, 12);
        $años = rand(16, 50);
        $nacimiento = date('m-d-Y', mktime(0, 0, 0, date("m")-$meses, date("d")-$dias, date("Y")-$años));
        $apellidos = fake()->lastName();
        return [
            'nombre' => fake()->firstName(),
            'apellidos' => substr($apellidos,strpos($apellidos, " ")),
            'fecha_nac' => $nacimiento,
            'direccion' => fake()->address(),
            'email' => fake()->unique()->safeEmail(),
            'p_trabajo' => fake()->randomElement(['Limpieza', 'Restaurante', 'Recepción', 'Contabilidad', 'Mantenimiento']),
            'schedule_id' => fake()->numberBetween(0, 2)
        ];
    }
}
