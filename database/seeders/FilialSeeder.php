<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FilialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filiales = [
            [
                'nombre' => 'Gerencia Guatemala',
                'descripcion' => 'Administrador de Guatemala',
                'direccion' => 'Direccion de prueba',
                'telefono' => '87654321',
                'correo' => 'usuario1@example.com',
                'pais_id' => 1
            ],
            [
                'nombre' => 'Gerencia El Salvador',
                'descripcion' => 'Administrador de El Salvador',
                'direccion' => 'Direccion de prueba',
                'telefono' => '87654321',
                'correo' => 'usuario2@example.com',
                'pais_id' => 2
            ],
            [
                'nombre' => 'Gerencia Honduras',
                'descripcion' => 'Administrador de Honduras',
                'direccion' => 'Direccion de prueba',
                'telefono' => '87654321',
                'correo' => 'usuario3@example.com',
                'pais_id' => 3
            ],
            [
                'nombre' => 'Gerencia Costa Rica',
                'descripcion' => 'Administrador de Costa Rica',
                'direccion' => 'Direccion de prueba',
                'telefono' => '87654321',
                'correo' => 'usuario4@example.com',
                'pais_id' => 4
            ],
            [
                'nombre' => 'Gerencia Nicaragua',
                'descripcion' => 'Administrador de Nicaragua',
                'direccion' => 'Direccion de prueba',
                'telefono' => '87654321',
                'correo' => 'usuario5@example.com',
                'pais_id' => 5
            ],
            [
                'nombre' => 'Gerencia Panama',
                'descripcion' => 'Administrador de Panama',
                'direccion' => 'Direccion de prueba',
                'telefono' => '87654321',
                'correo' => 'usuario6@example.com',
                'pais_id' => 6
            ],
        ];

        \App\Models\Filial::insert($filiales);
    }
}
