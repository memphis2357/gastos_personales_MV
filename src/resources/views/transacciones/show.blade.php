@extends('layouts.app')

@section('titulo', 'Detalle de Transaccion')

@section('contenido')
    <div>
        <div>
            <h1>Detalle de Transaccion</h1>
            <div>
                <p><strong>Id:</strong> {{$transaccion['id']}} </p>
                <p><strong>ID de usuario:</strong>{{$transaccion['user_id']}}</p>
                <p><strong>Descripcion:</strong>{{$transaccion['descripcion']}}</p>
                <p><strong>Monto:</strong>{{$transaccion['amount']}}</p>
                <p><strong>Fecha de transaccion:</strong>{{$transaccion['transaccion_date']}}</p>
                <p><strong>Categoria:</strong> {{ $transaccion->categoria->nombre }}</p>
                <p><strong>Grupo:</strong> {{ $transaccion->grupo->nombre }}</p>
                <p><strong>Fecha e creacion:</strong>{{$transaccion['created_at']}}</p>
                <p><strong>Fecha de actualizacion:</strong>{{$transaccion['updated_at']}}</p>
            </div>
            <a href="{{route('transacciones.index')}}">Volver al listado</a>
            <a href="{{route('transacciones.edit', $transaccion['id'])}}">Editar</a>
        </div>
    </div>
@endsection

