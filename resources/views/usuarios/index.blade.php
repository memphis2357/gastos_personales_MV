@extends('layouts.app')

@section('titulo', 'lista de usuarios')

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
</head>
<body>

<div class="container">
    <h1>Listado de Usuarios</h1>
    <a href="{{ route('usuarios.create') }}">Crear Usuario</a>

    @if(session('exito'))
        <div>
            <span> {{ session('exito') }}</span>
            <span>X</span>
        </div>
    @endif

    @empty($datos)
        <p>No existen transacciones actualmente</p>
    @else

    <table>
        <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Contraseña</th>
            <th>Creado en</th>
            <th>Actualizado en</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($datos as $dato): ?>
        <tr>
            <td><?= $dato['id']; ?></td>
            <td><?= $dato['name']; ?></td>
            <td><?= $dato['email']; ?></td>
            <td><?= $dato['password']; ?></td>
            <td><?= $dato['created_at']; ?></td>
            <td><?= $dato['updated_at']; ?></td>
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

