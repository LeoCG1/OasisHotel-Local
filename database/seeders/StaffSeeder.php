<?php

namespace Database\Seeders;
use Faker\Factory as Faker;
use App\Models\Staff;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for($i = 0; $i<= 50; $i++){
            $ahora = date('Y-m-d');
            $dias = date("Y-m-d",strtotime($ahora."- ". rand(1, 30) ." days"));
            $meses = date("Y-m-d",strtotime($dias."- ". rand(1, 12) ." months"));
            $nacimiento = date("Y-m-d",strtotime($meses."- ". rand(16, 50) ." years"));
            $staff = new Staff();
            $staff->nombre = $faker->firstName();
            $staff->apellidos = $faker->lastName();
            $staff->fecha_nac = $nacimiento;
            $staff->direccion = $faker->address();
            $staff->email = $faker->unique()->safeEmail();
            $staff->p_trabajo = $faker->randomElement(['Limpieza', 'Restaurante', 'Recepción', 'Contabilidad', 'Mantenimiento']);
            if($i % 3 == 0){
                $staff->user_id = rand(1, 49);
            }else{
                $staff->user_id = null;
            }
            $staff->save();
        }
    }
}
