<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Grupo;
use App\Models\Transaccion;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Mail;
use App\Mail\TransaccionCreadaMail;
use App\Jobs\TransaccionCreadaJob;

class TransaccionesController extends Controller{

    use AuthorizesRequests;

    public function index(){
        $datos = Transaccion::where('user_id', auth()->user()->id)->get();
        return view('transacciones.index', ['datos' => $datos]);
    }

    public function create(){
        $grupos = Grupo::all();
        $categorias = Categoria::all();

        return view('transacciones.create', compact('grupos', 'categorias'));
    }

    public function store(Request $request) {
        // 1) Validar los datos
        $request->validate([
            'descripcion' => 'required|min:5|max:200',
            'monto' => 'required|numeric|min:0.01',
            'fecha_transaccion' => 'required|date',
            'categoria' => 'required',
            'grupo' => 'required',
        ]);
        // 2) Guardar los datos
        $transaccion=Transaccion::create([
            'descripcion' => $request->input('descripcion'),
            'monto' => $request->input('monto'),
            'fecha_transaccion' => $request->input('fecha_transaccion'),
            'categoria_id' => $request->input('categoria'),
            'grupo_id' => $request->input('grupo'),
            'user_id' => auth()->id(),
        ]);

        // 3.1)
        //Mail::to(auth()->user()->email)
            //->queue(new TransaccionCreadaMail($transaccion));

        // 3.2)
        TransaccionCreadaJob::dispatch(auth()->user()->email, $transaccion)->delay(10);


        // 4) Redirigir a una nueva ruta con un mensaje
        return redirect()
            ->route('transacciones.index')
            ->with('exito', 'Transaccion creada exitosamente.');
    }

    public function show(Transaccion $transaccion) {
        // 1) Si no existe, redirigir con error
        if(!$transaccion) {
            return redirect()
                ->route('transacciones.index')
                ->with('error', 'Transaccion no encontrada.');
        }
        // 2) Si existe, devolver la vista transacciones.show
        return view('transacciones.show', ['transaccion' => $transaccion]);
    }

    public function edit(Transaccion $transaccion) {

        // Restringir el acceso solamente a los usuarios dueños de esta transaccion
        $this->authorize('update', $transaccion);

        // 1) Si no existe, redirigir con error
        if(!$transaccion) {
            return redirect()
                ->route('transacciones.index')
                ->with('error', 'Transaccion no encontrada.');
        }
        // 2) Si existe, devolver la vista transacciones.edit
        return view('transacciones.edit', compact('transaccion'));
    }

    public function update(Request $request, Transaccion $transaccion) {
        // 1) Leer datos del formulario (se inyectan con la variable $request)
        // 2) Validar los datos
        $request->validate([
            'descripcion' => 'required|min:5|max:200',
            'monto' => 'required|numeric|min:0.01',
            'fecha_transaccion' => 'required|date',
        ]);
        // 3) Actualizar los datos
        Transaccion::where('id', $transaccion->id)
            ->update([
                'descripcion' => $request->input('descripcion'),
                'monto' => $request->input('monto'),
                'fecha_transaccion' => $request->input('fecha_transaccion'),
            ]);

        // 4) Redirigir a una nueva ruta con un mensaje
        return redirect()
            ->route('transacciones.index')
            ->with('exito', 'Transaccion actualizada exitosamente.');
    }

    public function destroy(Transaccion $transaccion) {
        // Eliminar la transaccion de la base de datos
        Transaccion::destroy($transaccion->id);
        // Pretendemos eliminar el elemento
        return redirect()
            ->route('transacciones.index')
            ->with('exito', 'Transaccion eliminada.');
    }
}
