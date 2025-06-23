@extends('layouts.app')

@section('titulo', 'Mis comprobantes')

@section('contenido')
    <div>
        <h1>Listado de Comprobantes</h1>
        <a href="{{route('comprobantes.create')}}">Crear Comprobante</a>
    </div>

    @empty($infoArchivos)
        <p>No existen comprobantes en este momento</p>
    @else
        <table>
            <thead>
            <tr>
                <th>Nombre</th>
                <th>Imagen</th>
                <th>Accion</th>
            </tr>
            </thead>
            <tbody>
                @foreach($infoArchivos as $archivo)
                    <tr>
                        <td>{{$archivo['nombre']}}</td>
                        <td> @php
                                $extension = pathinfo($archivo['nombre'], PATHINFO_EXTENSION);
                            @endphp
                            @if(in_array($extension, ['jpg', 'jpeg', 'png']))
                                <img src="{{$archivo['url']}}" alt="{{$archivo['nombre']}}" style="max-height: 200px">
                            @endif
                        </td>
                        <td>
                            <a href="{{$archivo['url']}}" target="blank">Ver/Descargar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endempty
@endsection
