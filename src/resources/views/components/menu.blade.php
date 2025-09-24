<nav class="bg-blue-500 p-4 text-white">
    <ul class="flex space-x-4">
        <li>
            <a href="{{route('inicio')}}" class="{{ request()->routeIs('inicio') ? 'font-bold underline' : 'hover:underline' }}">Inicio</a>
        </li>
        <li>
            <a href="{{route('transacciones.index')}}" class="{{ request()->routeIs('transacciones.index') ? 'font-bold underline' : 'hover:underline' }}">Transacciones</a>
        </li>
        @can('ver-listado-usuarios')
        <li>
            <a href="{{route('usuarios.index')}}" class="{{ request()->routeIs('usuarios.index') ? 'font-bold underline' : 'hover:underline' }}">Usuarios</a>
        </li>
        @endcan
        <li>
            <a href="{{route('comprobantes.index')}}" class="{{ request()->routeIs('comprobantes.index') ? 'font-bold underline' : 'hover:underline' }}">Comprobantes</a>
        </li>
        <li>
            <a href="{{route('grupos.index')}}" class="{{ request()->routeIs('grupos.index') ? 'font-bold underline' : 'hover:underline' }}">Grupos</a>
        </li>
    </ul>
</nav>

