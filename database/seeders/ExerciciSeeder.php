<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ExerciciSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('exercicis')->insert([
            [
                'categoria_id' => 1,
                'nom' => 'Bíceps curl',
                'descripcio' => 'Exercici per a bíceps',
                'imatge' => null
            ],
            [
                'categoria_id' => 2,
                'nom' => 'Asseguts',
                'descripcio' => 'Cames i glutis',
                'imatge' => null
            ],
            [
                'categoria_id' => 3,
                'nom' => 'Press banca',
                'descripcio' => 'Pit',
                'imatge' => null
            ],
        ]);
    }
}