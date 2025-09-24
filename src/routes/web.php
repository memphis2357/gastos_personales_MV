<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TransaccionesController;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ComprobantesController;
use App\Http\Controllers\GruposController;
use App\Http\Controllers\AuthController;

//Zona pública de la aplicación

Route::get('/', function () {return view('welcome');})
    ->name('inicio');

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


Route::get('/grupos', [GruposController::class, 'index'])
    ->name('grupos.index');

// RUTAS DE AUTENTICACIÓN

// 1)Ruta que muestre la página de login
Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login')
    ->middleware('guest');

// 2)Ruta que procese los datos de login
Route::post('/login', [AuthController::class, 'storeLogin'])
    ->name('login.store');

// 3)Ruta que muestre el "panel de control" de la aplicacion
Route::get('/dashboard', function() {
    echo "Bienvenido al dashboard(esta zona es privada)";})
    ->name('dashboard')
    ->middleware('auth');

// 3)Ruta para cerrar sesión
Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

//Route::get('/usuarios', function() {echo "Listado de usuarios";})
//    ->name('usuarios.index')
//    ->middleware('auth', 'can:ver-listado-usuarios');

// Rutas reseteo de contraseña (deben ser públicas)
// 1 ruta para mostrar el formulario de envio de reseteo
// 2 ruta para mostrar el formulario de reseteo de contraseña
// 3 ruta para confirmar la nueva contraseña
