<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Clients;
use App\Models\Staff;
use Database\Factories\ClientFactory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(50)->create();

        $this->call([
            PrimerAdmin::class,
            CommentSeeder::class,
            FloorSeeder::class,
            RoomSeeder::class,
            ClientSeeder::class,
            ReservationSeeder::class,
            ScheduleSeeder::class,
            StaffSeeder::class,
            RoomStaffTableSeeder::class,
            ScheduleStaffTableSeeder::class,
            ReservRoomSeeder::class,
            PaymentSeeder::class,
        ]);
    }
}
