<?php

namespace Database\Seeders;
use App\Models\Clients;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0 ; $i< 50; $i++){
            $client = new Clients();
            $client->dni = $faker->numberBetween(10000000, 99999999) . fake()->randomLetter();
            $client->nombre = $faker->firstName();
            $client->apellidos = $faker->lastName();
            $client->direccion = $faker->address();
            $client->telefono = $faker->phoneNumber();
            $client->email = $faker->unique()->safeEmail();
            $client->tipo_cliente = $faker->randomElement(['Privado', 'Agencia']);
            $client->user_id = $faker->numberBetween(1, 40);
            $client->save();
        }
    }
}
