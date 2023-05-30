<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class PrimerAdmin extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contraseña = "admin1234";

        $user = new User();
        $user->name = 'administrador';
        $user->email = 'admin@hotmail.com';
        $user->password = Hash::make($contraseña);
        $user->save();

        $admin = new Admin();
        $admin->nombre = 'admin';
        $admin->user_id = 51;
        $admin->save();
    }
}
