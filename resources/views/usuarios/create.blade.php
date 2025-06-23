@extends('layouts.app')

@section('titulo', 'Nuevo Usuario')

@section('contenido')
    <div>
        <h1>Crear Nuevo Usuario</h1>

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

        <form action="{{ route('usuarios.store') }}" method="post">
            @csrf
            <lab for="name">Nombre</lab>
            <input type="text" name="name" id="name" value="{{old('name')}}" required>
            @error('name')
            <p>{{$message}}</p>
            @enderror

            <lab for="email">Email</lab>
            <input type="email" name="email" id="email" value="{{old('email')}}" required>
            @error('email')
            <p>{{$message}}</p>
            @enderror

            <lab for="password">Contraseña</lab>
            <input type="password" name="password" id="password" value="{{old('password')}}" required>
            @error('password')
            <p>{{$message}}</p>
            @enderror

            <div><br>
                <button type="submit">Guardar Usuario</button><br>
                <a href="{{ route('usuarios.index') }}">Cancelar Guardado</a>
            </div>
        </form>
    </div>
@endsection

