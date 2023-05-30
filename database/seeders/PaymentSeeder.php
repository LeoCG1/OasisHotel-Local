<?php

namespace Database\Seeders;
use App\Models\Clients;
use App\Models\Payment;
use App\Models\Reservation;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $clients = Clients::all();

        foreach($clients as $key => $client){
            $reserva = Reservation::all()->where('client_id', $client->dni)->first();
            $pago = new Payment();
            $pago->concepto = 'Estancia';
            $pago->direccion = $client->direccion;
            $pago->num_tarjeta = $faker->numberBetween(1000000000000000, 9999999999999999);
            $pago->total = $faker->randomElement([70, 150, 220]);
            $pago->reservation_id = $reserva->id;
            $pago->save();
        }

    }
}
