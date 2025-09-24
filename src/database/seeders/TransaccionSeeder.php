<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaccion;
use App\Models\Categoria;
use App\Models\Grupo;

class TransaccionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //leer las categorias y grupos existentes
        $idsGrupo = Grupo::all()->pluck('id');
        $idsCategoria = Categoria::all()->pluck('id');
        $idsUsuarios = User::all()->pluck('id');

        //Asignar a categoria_id uno de los 10 existentes en la tabla catgeorias
        Transaccion::factory()->count(10)->create([
            'categoria_id' => function () use ($idsCategoria) {
            return fake()->randomElement($idsCategoria);
            },
            'grupo_id' => function () use ($idsGrupo) {
                return fake()->randomElement($idsGrupo);
            },
            'user_id' => function () use ($idsUsuarios) {
                return fake()->randomElement($idsUsuarios);
            }

        ]);

    }
}
