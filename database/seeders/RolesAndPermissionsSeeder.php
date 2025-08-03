<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $permisoGestionUsuarios = Permission::create(['name' => 'gestion usuarios']);
        $permisoGestionHorarios = Permission::create(['name' => 'gestion horarios']);
        $permisoGestionCarreras = Permission::create(['name' => 'gestion carreras']);

        // Crear roles
        $admin = Role::create(['name' => 'admin']);
        $coordinador = Role::create(['name' => 'coordinador']);
        $tutor = Role::create(['name' => 'tutor']);
        $estudiante = Role::create(['name' => 'estudiante']);

        // Asignar permisos a roles
        $admin->givePermissionTo([$permisoGestionUsuarios, $permisoGestionHorarios, $permisoGestionCarreras]);
        $coordinador->givePermissionTo([$permisoGestionHorarios, $permisoGestionCarreras]);
        $tutor->givePermissionTo([$permisoGestionHorarios]);
    }
}
