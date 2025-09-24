<?php

namespace App\Helpers;
use Carbon\Carbon;

class Transacciones {
    public static function getDatos():array {
        $ahora = Carbon::now();
        return [
            [
                'user_id' => 1,
                'descripcion' => 'Compra general',
                'amount' => 15000.75,
                'transaccion_date' => '2019-01-10',
                'create_at' => $ahora,
                'update_at' => $ahora,
            ],
            [
                'user_id' => 2,
                'descripcion' => 'pago factura de luz',
                'amount' => 2400.95,
                'transaccion_date' => '2019-01-26',
                'create_at' => $ahora,
                'update_at' => $ahora,
            ],
            [
                'user_id' => 1,
                'descripcion' => 'Cena en un restaurante',
                'amount' => 128730,
                'transaccion_date' => '2019-04-13',
                'create_at' => $ahora,
                'update_at' => $ahora,
            ]
        ];
    }
}
