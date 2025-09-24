<?php

namespace App\Http\Controllers;

use App\Http\Requests\CrearComprobanteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\File;


class ComprobantesController extends Controller{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        //leer todos los comprobantes del disco
        $archivos = Storage::disk('public')->files('comprobantes');
        //recorrer los archvios y extraer la info necesaria
        $infoArchivos = Collect($archivos)->map(function($arch) {
            return [
                'nombre' => basename($arch),
                'ruta' => $arch,
                'url' =>  Storage::url($arch),
            ];
        });
        return view('comprobantes.index', compact('infoArchivos'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(){
        return view('comprobantes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CrearComprobanteRequest $request){
        //1) validar el archivo
        //2) validar que el usuario tenga permiso para subir archivos (mas adelante)
        //3) Movel el archivo al disco local
        $comprobante = $request->file('comprobante');
        //4) Subir a la bd (más adelante)
        //5) Redirigir a la página anterior con mensaje
        return back()->with(['exito'=>'Se ha guardado el comprobante']);
    }

    /**
     * Display the specified resource.
     */
}
