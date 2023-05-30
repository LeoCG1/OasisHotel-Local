<?php

namespace Database\Seeders;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Schedule;
class ScheduleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $horario = new Schedule();
        $horario->franja_horaria = '8am - 12pm';
        $horario->save();

        $horario = new Schedule();
        $horario->franja_horaria = '12pm - 17pm';
        $horario->save();

        $horario = new Schedule();
        $horario->franja_horaria = '17pm - 21pm';
        $horario->save();

        $horario = new Schedule();
        $horario->franja_horaria = '21pm - 1am';
        $horario->save();

        $horario = new Schedule();
        $horario->franja_horaria = '1am - 5am';
        $horario->save();

        $horario = new Schedule();
        $horario->franja_horaria = '5am - 9am';
        $horario->save();

    }
}
