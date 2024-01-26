<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            [
                'nombre' => 'Corporativo',
                'descripcion' => 'Administrador del sistema',
                'estado' => 1,
            ],
            [
                'nombre' => 'Gerente',
                'descripcion' => 'Usuario del sistema',
                'estado' => 1,
            ],
        ];

        \App\Models\Rol::insert($roles);
    }
}
