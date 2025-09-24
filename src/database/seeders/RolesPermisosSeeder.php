<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class RolesPermisosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Opcional: Reinicia los permisos en la cache
        // app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // 1) Definir (crear) los permisos
        $permisoVerListadoTransacciones = permission::create(['name' => 'ver-listado-transacciones']);
        $permisoVerTransaccion = permission::create(['name' => 'ver-transaccion']);
        $permisoCrearTransaccion = permission::create(['name' => 'crear-transaccion']);
        $permisoEditarTransaccion = permission::create(['name' => 'editar-transaccion']);
        $permisoEliminarTransaccion = permission::create(['name' => 'eliminar-transaccion']);

        $permisoVerListadoUsuarios = permission::create(['name' => 'ver-listado-usuarios']);
        $permisoVerUsuarios = permission::create(['name' => 'ver-usuario']);
        $permisoCrearUsuarios = permission::create(['name' => 'crear-usuario']);
        $permisoEditarUsuarios = permission::create(['name' => 'editar-usuario']);
        $permisoEliminarUsuarios = permission::create(['name' => 'eliminar-usuario']);

        // 2) Definir Roles
        $rolAdmin = Role::create(['name' => 'admin']);
        $rolNormal = Role::create(['name' => 'normal']);

        // 3) Asignar permisos a los roles
        $rolAdmin->givePermissionTo([
            $permisoVerListadoTransacciones,
            $permisoVerTransaccion,
            $permisoCrearTransaccion,
            $permisoEditarTransaccion,
            $permisoEliminarTransaccion,
            $permisoVerListadoUsuarios,
            $permisoVerUsuarios,
            $permisoCrearUsuarios,
            $permisoEditarUsuarios,
            $permisoEliminarUsuarios,
        ]);

        $rolNormal->givePermissionTo([
            $permisoVerListadoTransacciones,
            $permisoVerTransaccion,
            $permisoCrearTransaccion,
            $permisoEditarTransaccion,
            $permisoEliminarTransaccion,
        ]);

        // 4) Crear usuarios de prueba y asignarle roles

        $usuarioAdmin = User::create([
            'name' => 'usuario admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('1234'),
        ]);

        $usuarioNormal = User::create([
            'name' => 'usuario normal',
            'email' => 'normal@gmail.com',
            'password' => bcrypt('1234'),
        ]);

        $usuarioAdmin->assignRole('admin');
        $usuarioNormal->assignRole('normal');


    }
}
