@extends('layouts.app')

@section('titulo', 'Editar Transaccion')

@section('contenido')
    <div>
        <h1>Crear nueva transaccion</h1>

        @if($errors->any())
            <div>
                <strong>Error</strong>
                <span>Corrija los errores del formulario</span>
                <!-- <ul>
                    @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                    @endforeach
                </ul> -->
            </div>
        @endif

        <form action="{{ route('transacciones.update', $transaccion['id']) }}" method="post">
            @csrf
            @method('PUT')
            <lab for="descricpcion">Descripcion</lab>
            <input type="text" name="descripcion" id="descripcion" value="{{old('descripcion', $transaccion['descripcion'])}}" required>
            @error('descripcion')
            <p>{{$message}}</p>
            @enderror

            <lab for="monto">Monto</lab>
            <input type="number" name="monto" id="monto" value="{{old('monto', $transaccion['amount'])}}" required>
            @error('monto')
            <p>{{$message}}</p>
            @enderror

            <lab for="fecha_transaccion">Fecha de Transaccion</lab>
            <input type="date" name="fecha_transaccion" id="fecha_transaccion" value="{{old('fecha_transaccion', $transaccion['transaccion_date'])}}" required>
            @error('fecha_transaccion')
            <p>{{$message}}</p>
            @enderror

            <div><br>
                <button type="submit">Actualizar Transaccion</button><br>
                <a href="{{ route('transacciones.index') }}">Cancelar Atualizacion</a>
            </div>
        </form>
    </div>
@endsection

