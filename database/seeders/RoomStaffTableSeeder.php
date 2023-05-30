<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Room;
use App\Models\Staff;
class RoomStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $staffs = Staff::all()->where('p_trabajo', 'Limpieza');

        $fecha = date('Y-m-d');

        for($i = 1; $i <= 31; $i++){
            foreach($staffs as $key => $staff){
                $hab_random = Room::all()->random(4);
                $staff->room()->attach($hab_random, ['fecha_staff' => $fecha]);
            }
            $fecha = date("Y-m-d",strtotime($fecha."+ ". 1 ." days"));
        }
    }
}
