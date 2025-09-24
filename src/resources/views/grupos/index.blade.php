@extends('layouts.app')

@section('titulo', 'lista de transacciones')

@section('contenido')

    <style>
        table {
            width: 100%;
            margin-top: 10px;
            margin-bottom: 30px;
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
        h1 {
            text-align: center;
        }
    </style>

    <div class="container">

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

            @empty($transaccionesPorGrupo)
                <p>No existen transacciones actualmente</p>
            @else
                @foreach($transaccionesPorGrupo as $grupoNombre => $transacciones)
                    <h1>{{ $grupoNombre }}</h1>
                    <table>
                        <thead>
                        <tr>
                            <th>Descripcion</th>
                            <th>Monto</th>
                            <th>Categoria</th>
                            <th>Tipo Categoria</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($transacciones as $dato)
                            <tr>
                                <td>{{ $dato['descripcion'] }}</td>
                                <td>{{ $dato['monto'] }}</td>
                                <td>{{ $dato->categoria->nombre ?? '-' }}</td>
                                <td>
                                    @if($dato->categoria)
                                        @if($dato->categoria->tipo === 'ingreso')
                                            <span style="color: green;">Ingreso</span>
                                        @elseif($dato->categoria->tipo === 'gasto')
                                            <span style="color: red;">Gasto</span>
                                        @endif
                                    @else
                                        -
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @endforeach
            @endempty
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log("Cargó la página");
        });
    </script>
@endsection
