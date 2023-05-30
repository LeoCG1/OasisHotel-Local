<?php

namespace Database\Seeders;
use App\Models\Reservation;
use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReservRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $reservas = Reservation::all();
        
        foreach($reservas as $key => $reserva){
            if($key % 2 == 0){
                $room = Room::all()->where('descripcion', 'Suite')->random(1);
                $reserva->room()->attach($room);
            }else if($key % 3 == 0){
                $room = Room::all()->where('descripcion', 'Gran Suite')->random(1);
                $reserva->room()->attach($room);
            }else if($key % 5 == 0){
                $room = Room::all()->where('descripcion', 'Familiar')->random(1);
                $reserva->room()->attach($room);
            }
            
        }
    }
}
