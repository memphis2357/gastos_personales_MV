<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatosInicialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //cargar contenido del archivo database/sql/datos.sql
        $sql = file_get_contents(database_path('sql/datos.sql'));
        //ejecutar el contido del archivo en nuestra base de datos
        DB::unprepared($sql);
    }
}
