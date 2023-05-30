<?php

namespace Database\Seeders;
use App\Models\Room;
use App\Models\Floor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pisos = Floor::all();
        foreach($pisos as $key => $piso){
            for ($i = 1 ; $i<= 6; $i++){
                if($i>= 1 and $i < 4){
                    $room = new Room();
                    $room->descripcion = 'Suite';
                    $room->capacidad = 2;
                    $room->num_habitacion = $i;
                    $room->planta = ($key>0)?$key: null;
                    $room->precio = 70;
                    $room->piso_id = ($key>0)?$key: null;
                    $room->save();
                }
                if($i>= 4 and $i < 6){
                    $room = new Room();
                    $room->descripcion = 'Gran Suite';
                    $room->capacidad = 4;
                    $room->num_habitacion = $i;
                    $room->planta = ($key>0)?$key: null;
                    $room->precio = 150;
                    $room->piso_id = ($key>0)?$key: null;
                    $room->save();
                }
                if($i == 6){
                    $room = new Room();
                    $room->descripcion = 'Familiar';
                    $room->capacidad = 5;
                    $room->num_habitacion = $i;
                    $room->planta = ($key>0)?$key: null;
                    $room->precio = 220;
                    $room->piso_id = ($key>0)?$key: null;
                    $room->save();
                }
            }
        }
        
    }
}
