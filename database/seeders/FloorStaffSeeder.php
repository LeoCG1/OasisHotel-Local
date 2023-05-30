<?php

namespace Database\Seeders;
use App\Models\Staff;
use App\Models\Floor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FloorStaffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $floor = Floor::all();
        $staffs = Staff::all()->where('p_trabajo', 'Limpieza');
        foreach($staffs as $staff){
            $piso_random = $floor->random(2);
            $staff->floor()->attach($piso_random);
        }
    }
}
