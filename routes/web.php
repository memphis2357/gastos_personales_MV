<?php

use App\Http\Controllers\PruebaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ComprobantesController;

Route::get('/', function () {return view('welcome');})
    ->name('inicio');

Route::get('/prueba', [PruebaController::class, 'index'])
    ->name('prueba.index');

Route::get('/prueba2', [PruebaController::class, 'crear'])
    ->name('prueba.crear');

//muestra el listado de transacciones
Route::get('/transacciones', [TransaccionesController::class, 'index'])
    ->name('transacciones.index');
//muestra la pagina con el formulario para crear una transaccion
Route::get('/transaciones/create', [TransaccionesController::class, 'create'])
    ->name('transacciones.create');
//recibe los datos del formulario de creacion de una tranasacion
Route::post('/transacciones', [TransaccionesController::class, 'store'])
    ->name('transacciones.store');
//muestra una transaccion específica
Route::get('/transacciones/{transaccion}', [TransaccionesController::class, 'show'])
    ->name('transacciones.show');
//muestra el formulario para editar una transaccion específica
Route::get('/transacciones/{transaccion}/edit', [TransaccionesController::class, 'edit'])
    ->name('transacciones.edit');
//actualiza una transaccion específica
Route::put('/transacciones/{transaccion}', [TransaccionesController::class, 'update'])
    ->name('transacciones.update');
Route::delete('/transacciones/{transaccion}', [TransaccionesController::class, 'destroy'])
    ->name('transacciones.destroy');



//muestra el listado de usuarios
Route::get('/usuario', [UsuariosController::class, 'index'])
    ->name('usuarios.index');
//muestra la pagina con el formulario para crear un usuario
Route::get('/usuario/create', [UsuariosController::class, 'create'])
    ->name('usuarios.create');
//recibe los datos del formulario de creacion de un usuario
Route::post('/usuario', [UsuariosController::class, 'store'])
    ->name('usuarios.store');


//definir las 7 rutas REST, excepto las 3 mencionadas
Route::resource('comprobantes', ComprobantesController::class)
    ->except(['show', 'edit', 'update', 'destroy']);

