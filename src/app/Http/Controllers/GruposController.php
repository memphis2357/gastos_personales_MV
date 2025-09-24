<?php

namespace App\Http\Controllers;

use App\Models\Transaccion;

class GruposController extends Controller
{
    public function index()
    {
        // Obtener todas las transacciones con sus relaciones
        $datos = Transaccion::with('categoria', 'grupo')->get();

        // Agrupar por nombre de grupo (o 'Sin grupo' si no existe)
        $transaccionesPorGrupo = $datos->groupBy(function ($transaccion) {
            return $transaccion->grupo->nombre ?? 'Sin grupo';
        });

        // Pasar a la vista
        return view('grupos.index', ['transaccionesPorGrupo' => $transaccionesPorGrupo]);
    }
}
