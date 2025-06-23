<?php
namespace App\Http\Controllers;

use App\Helpers\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UsuariosController extends Controller{
    private $archivo;
    private $carpeta;

    public function __construct(){
        $this->carpeta = storage_path('app/datos');
        $this->archivo = $this->carpeta.'/usuarios.json';

        //crear la carpeta storage/app/datos si no existe
        File::ensureDirectoryExists($this->carpeta);

        //si el archivo transacciones.json no existe, lo va a creear con un arreglo vacio
        if(!File::exists($this->archivo)){
            File::put($this->archivo, json_encode([]));
        }
    }
    public function index(){
        $datos = $this->leerUsuarios();
        return view('usuarios.index', ['datos' => $datos]);
    }

    public function create(){
        return view('usuarios.create');
    }

    public function store(Request $request){
        //1 Leer datos del formulario (se inyectan con la varible $request)
        //2 Validar datos

        $request->validate([
            'name' => 'required|min:5|max:40',
            'email' => 'required|email',
            'password' => 'required|min:4|max:20',
        ]);

        //3 Guardar los datos (en storage/app/datos/transacciones.json)

        $nuevoUsuario = [
            'id'=> uniqid(),
            'name'=> $request->input('name'),
            'email'=> $request->input('email'),
            'password'=> $request->input('password'),
            'created_at'=>now()->toDateTimeString(),
            'updated_at'=>now()->toDateTimeString(),
        ];

        $usuarios = $this->leerUsuarios();
        $usuarios[]= $nuevoUsuario;
        $this->guardarUsuarios($usuarios);

        //4 Redirigir a una nueva ruta con un mensaje

        return redirect()
            ->route('usuarios.index')
            ->with('exito', 'Usuario registrado correctamente');

    }

    private function leerUsuarios(): array{
        $contenido = File::get($this->archivo);
        return json_decode($contenido, true);
    }

    private function guardarUsuarios(array $usuarios): void{
        $contenido = json_encode($usuarios, JSON_PRETTY_PRINT);
        File::put($this->archivo, $contenido);
    }

}
