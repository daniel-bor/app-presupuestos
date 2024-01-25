<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Test User',
                'email' => 'danielebs175@gmail.com',
                'telefono' => '12345678',
                'filial_id' => 1,
                'rol_id' => 1,
                'descripcion' => 'Usuario de prueba',
                'password' => bcrypt('12345678'),
            ],
        ];

        \App\Models\User::insert($users);
    }
}
