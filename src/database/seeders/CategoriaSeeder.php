<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //creacion de una categoria normal
        Categoria::create([
            'nombre' => 'Salario',
            'tipo' => 'ingreso',
        ]);
        //usar el factory para crear 10 categorias al azar
        Categoria::factory()->count(10)->create();
    }
}
