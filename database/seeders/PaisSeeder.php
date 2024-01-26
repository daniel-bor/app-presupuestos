<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paises = [
            [
                'nombre' => 'Guatemala',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'nombre' => 'El Salvador',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'nombre' => 'Honduras',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'nombre' => 'Costa Rica',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'nombre' => 'Nicaragua',
                'descripcion' => '',
                'estado' => 1
            ],
            [
                'nombre' => 'Panama',
                'descripcion' => '',
                'estado' => 1
            ]
        ];

        \App\Models\Pais::insert($paises);
    }
}
