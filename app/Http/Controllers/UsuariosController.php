<?php
namespace App\Http\Controllers;

use App\Helpers\Usuarios;
use Illuminate\Http\Request;

class UsuariosController extends Controller{
    public function index(){
        $datos = Usuarios::getDatos();
        return view('usuarios', ['datos' => $datos]);
    }
}
