<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstudianteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
public function run(): void
{
    \App\Models\Estudiante::create([
        'nombrecompleto' => 'Fernando Rojas',
        'promedio' => 3.5,
        'edad' => 19,
        'fechadenacimiento' => '2006-05-30'
    ]);

    \App\Models\Estudiante::create([
        'nombrecompleto' => 'Adiel Puerta',
        'promedio' => 7.8,
        'edad' => 20,
        'fechadenacimiento' => '2005-03-10'
    ]);

    \App\Models\Estudiante::create([
        'nombrecompleto' => 'Davian Mendoza',
        'promedio' => 5.7,
        'edad' => 19,
        'fechadenacimiento' => '2006-07-18'
    ]);
}
}
