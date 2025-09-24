<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Models\User;

class UsuariosController extends Controller{
    public function index(){
        $datos = User::all();
        return view('usuarios.index', ['datos' => $datos]);
    }
}
