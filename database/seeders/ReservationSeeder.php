<?php

namespace Database\Seeders;
use App\Models\Clients;
use App\Models\Reservation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
class ReservationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $clients = Clients::all();

        foreach($clients as $key => $client){
            $ahora = date('Y-m-d');
            $ingreso = date("Y-m-d",strtotime($ahora."+ ". rand(2, 30) ." days"));
            $reserva = new Reservation();
            $reserva->personas = $faker->numberBetween(2, 5);
            $reserva->fecha_ingreso = $ingreso;
            $reserva->fecha_salida = date("Y-m-d",strtotime($ingreso."+ ". rand(2, 10) ." days"));
            $reserva->user_id = $faker->numberBetween(1, 50);
            $reserva->client_id = $client->dni;
            $reserva->save();
        }
    }
}
