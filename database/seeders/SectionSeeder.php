<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sections = [
            ['name' => 'Alimentos Básicos'],
            ['name' => 'Frutas y Verduras'],
            ['name' => 'Carnes y Pescados'],
            ['name' => 'Lácteos y Huevos'],
            ['name' => 'Panadería y Repostería'],
            ['name' => 'Bebidas'],
            ['name' => 'Snacks y Aperitivos'],
            ['name' => 'Productos Congelados'],
            ['name' => 'Cuidado Personal y Belleza'],
            ['name' => 'Limpieza y Hogar'],
            ['name' => 'Artículos para el Hogar'],
        ];

        DB::table('sections')->insert($sections);
    }
}
