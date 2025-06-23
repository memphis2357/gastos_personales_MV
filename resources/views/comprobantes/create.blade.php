@extends('layouts.app')

@section('titulo', 'Nuevo Comprobante')

@section('contenido')
    <div>
        <h1>Nuevo Comprobante</h1>

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
        <form action="{{route('comprobantes.store')}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="comprobante">Comprobante</label>
                <input type="file" name="comprobante" id="comprobante" required>
                @error('comprobante')
                    <p>{{$message}}</p>
                @enderror
            </div>
            <div>
                <a href="{{route('comprobantes.index')}}">Volver</a>
                <button type="submit">Guardar Comprobante</button>
            </div>

        </form>
@endsection
