<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Staff;
use App\Models\Schedule;
class ScheduleStaffTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fecha = date('Y-m-d');
        $staff = Staff::all()->where('p_trabajo', 'Limpieza');
        $rest = Staff::all()->where('p_trabajo', 'Restaurante')->where('p_trabajo', 'Recepción')->where('p_trabajo', 'Contabilidad');
        $mant = Staff::all()->where('p_trabajo', 'Mantenimiento');

        for($i = 1; $i <= 31; $i++){
            foreach($staff as $key => $empleado){
                if($key % 2 == 0){
                    $schedule = Schedule::all()->random(2); 
                    $empleado->schedule()->attach($schedule, ['fecha' => $fecha]);
                }else{
                    $schedule = Schedule::all()->random(1); 
                    $empleado->schedule()->attach($schedule, ['fecha' => $fecha]);
                }
            }
            foreach($mant as $key => $mantenimiento){
                if($key % 2 == 0){
                    $schedule = Schedule::all()->random(1); 
                    $mantenimiento->schedule()->attach($schedule, ['fecha' => $fecha]);
                }else{
                    $schedule = Schedule::all()->random(2); 
                    $mantenimiento->schedule()->attach($schedule, ['fecha' => $fecha]);
                }
            }
            foreach($rest as $key => $resto){
                if($key % 2 == 0){
                    $schedule = Schedule::all()->where('franja_horaria', '8am - 12pm')->where('franja_horaria', '12pm - 17pm')->random(1); 
                    $resto->schedule()->attach($schedule, ['fecha' => $fecha]);
                }else{
                    $schedule = Schedule::all()->where('franja_horaria', '8am - 12pm')->where('franja_horaria', '12pm - 17pm')->random(1); 
                    $resto->schedule()->attach($schedule, ['fecha' => $fecha]);
                }
            }
            $fecha = date("Y-m-d",strtotime($fecha."+ ". 1 ." days"));
        }
    }
}
