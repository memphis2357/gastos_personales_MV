@extends('layouts.app')

@section('titulo', 'lista de transacciones')

@section('contenido')

    <style>
        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
        }
    </style>

    <div class="container">
        <h1>Listado de Transacciones</h1>
        <a href="{{ route('transacciones.create') }}">Crear Transacciones</a>

        @if(session('exito'))
            <div>
                <span> {{ session('exito') }}</span>
                <span>X</span>
            </div>
        @endif

        @if(session('error'))
            <div>
                <span> {{ session('error') }}</span>
                <span>X</span>
            </div>
        @endif

        @empty($datos)
            <p>No existen transacciones actualmente</p>
        @else

        <table>
            <thead>
            <tr>
                <th>Id Usuario</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Fecha</th>
                <th>Creado en</th>
                <th>Actualizado en</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach($datos as $dato)
                <tr>
                    <td>{{ $dato['user_id']}}</td>
                    <td>{{ $dato['descripcion']}}</td>
                    <td>{{ $dato['amount']}}</td>
                    <td>{{ $dato['transaccion_date']}}</td>
                    <td>{{ $dato['created_at']}}</td>
                    <td>{{ $dato['updated_at']}}</td>
                    <td>
                        <a href="{{route('transacciones.show', $dato['id'])}}">Ver</a><br>
                        <a href="{{route('transacciones.edit', $dato['id'])}}">Editar</a><br>
                        <form action="{{route('transacciones.destroy', $dato['id'])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onsubmit="return confirm('¿Estas seguro que deseas eliminar la transaccion?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        @endempty
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Cargó la página");
        });
    </script>
@endsection




