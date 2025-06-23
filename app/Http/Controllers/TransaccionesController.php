<?php
namespace App\Http\Controllers;

use App\Helpers\Transacciones;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TransaccionesController extends Controller{
    private $archivo;
    private $carpeta;

    public function __construct(){
        $this->carpeta = storage_path('app/datos');
        $this->archivo = $this->carpeta.'/transacciones.json';

        //crear la carpeta storage/app/datos si no existe
        File::ensureDirectoryExists($this->carpeta);

        //si el archivo transacciones.json no existe, lo va a creear con un arreglo vacio
        if(!File::exists($this->archivo)){
            File::put($this->archivo, json_encode([]));
        }
    }
    public function index(){
        $datos = $this->leerTransacciones();
        return view('transacciones.index', ['datos' => $datos]);
    }

    public function create(){
        return view('transacciones.create');
    }

    public function store(Request $request){
        //1 Leer datos del formulario (se inyectan con la varible $request)
        //2 Validar datos

        $request->validate([
            'descripcion' => 'required|min:5|max:200',
            'monto' => 'required|numeric|min:0.01',
            'fecha_transaccion' => 'required|date',
        ]);

        //3 Guardar los datos (en storage/app/datos/transacciones.json)

        $nuevaTransaccion = [
            'id'=> uniqid(),
            'user_id'=> 1,
            'descripcion'=> $request->input('descripcion'),
            'amount'=> $request->input('monto'),
            'transaccion_date'=> $request->input('fecha_transaccion'),
            'created_at'=>now()->toDateTimeString(),
            'updated_at'=>now()->toDateTimeString(),
        ];

        $transacciones = $this->leerTransacciones();
        $transacciones[]= $nuevaTransaccion;
        $this->guardarTransacciones($transacciones);

        //4 Redirigir a una nueva ruta con un mensaje

        return redirect()
            ->route('transacciones.index')
            ->with('exito', 'Transaccion registrada correctamente');

    }

    public function show(string $id){
        // 1) Buscar la transaccion
        $transaccion = $this->buscarTransaccion($id);
        // 2) Si no existe, redirigir el error
        if(!$transaccion){
            return redirect()
                ->route('transacciones.index')
                ->with('error', 'Transaccion no encontrada');
        }
        // 3) Si existe, devolver la vista transacciones.show
        return view('transacciones.show', ['transaccion' => $transaccion]);
    }
    public function edit(string $id){
        // 1) Buscar la transaccion
        $transaccion = $this->buscarTransaccion($id);
        // 2) Si no existe, redirigir el error
        if(!$transaccion){
            return redirect()
                ->route('transacciones.index')
                ->with('error', 'Transaccion no encontrada');
        }
        // 3) Si existe, devolver la vista transacciones.edit
        return view('transacciones.edit', ['transaccion' => $transaccion]);

    }
    public function update(Request $request, string $id){
        //1 Leer datos del formulario (se inyectan con la varible $request)
        //2 Validar datos

        $request->validate([
            'descripcion' => 'required|min:5|max:200',
            'monto' => 'required|numeric|min:0.01',
            'fecha_transaccion' => 'required|date',
        ]);

        //3 Acualizar los datos (en storage/app/datos/transacciones.json)

        $transacciones = $this->leerTransacciones($id);
        foreach($transacciones as $clave => $transaccion){
            if($transaccion['id'] === $id){
                $transacciones[$clave]['descripcion'] = $request->input('descripcion');
                $transacciones[$clave]['amount'] = $request->input('monto');
                $transacciones[$clave]['transaction_date'] = $request->input('fecha_transaccion');
                $transacciones[$clave]['updated_at'] = now()->toDateTimeString();
                $encontrado = true;
                break;
            }
        }
        if(!$encontrado){
            return redirect()
                ->route('transacciones.index')
                ->with('error', 'Transaccion no encontrada');
        }

        $this->guardarTransacciones($transacciones);

        //4 Redirigir a una nueva ruta con un mensaje

        return redirect()
            ->route('transacciones.index')
            ->with('exito', 'Transaccion actualizada correctamente');

    }

    public function destroy(string $id){
        //pretendemos eliminar el elementoo
        return redirect()
            ->route('transacciones.index')
            ->with('exito', 'Transaccion eliminada');
    }


    private function leerTransacciones(): array{
        $contenido = File::get($this->archivo);
        return json_decode($contenido, true);
    }
    private function guardarTransacciones(array $transacciones): void{
        $contenido = json_encode($transacciones, JSON_PRETTY_PRINT);
        File::put($this->archivo, $contenido);
    }
    private function buscarTransaccion(string $id): ?array{
        $transacciones = $this->leerTransacciones();
        foreach ($transacciones as $transaccion) {
            if($transaccion['id'] === $id){
                return $transaccion;
            }
        }
        return null;
    }
}
