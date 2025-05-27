<?php


namespace App\Helpers;

use Carbon\Carbon;

class Usuarios
{
    public static function getDatos(): array
    {
        $ahora = Carbon::now();
        return [
            [
                'id' => 1,
                'name' => 'Carmen',
                'email' => 'carmen23@gmail,com',
                'password' => 'contraseña',
                'create_at' => $ahora,
                'update_at' => $ahora,
            ],
            [
                'id' => 2,
                'name' => 'Julio',
                'email' => 'julio443@gmail,com',
                'password' => '1234',
                'create_at' => $ahora,
                'update_at' => $ahora,
            ],
            [
                'id' => 3,
                'name' => 'Miguel',
                'email' => 'migule113@gmail,com',
                'password' => 'nce8833d',
                'create_at' => $ahora,
                'update_at' => $ahora,
            ]
        ];
    }
}

