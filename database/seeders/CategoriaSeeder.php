<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            ['nom'=>'Braços','descripcio'=>'Exercicis per braços i espatlla'],
            ['nom'=>'Cames','descripcio'=>'Exercicis per fer cames'],
            ['nom'=>'Pit','descripcio'=>'Exercicis per pit'],
            ['nom'=>'Esquena','descripcio'=>'Exercicis per esquena'],
            ['nom'=>'Core','descripcio'=>'Exercicis abdomen i lumbar'],
        ]);
    }
}
