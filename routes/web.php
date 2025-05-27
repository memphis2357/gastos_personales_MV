<?php

use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionesController;
use App\Http\Controllers\UsuariosController;

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/prueba', [PruebaController::class, 'index'])
    ->name('prueba.index');

Route::get('/prueba2', [PruebaController::class, 'crear'])
    ->name('prueba.crear');

Route::get('/transacciones', [TransaccionesController::class, 'index'])
    ->name('transacciones.index');

Route::get('/usuario', [UsuariosController::class, 'index'])
    ->name('usuarios.index');
