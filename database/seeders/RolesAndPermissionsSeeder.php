<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Lista de permisos
        $permissions = [
            'gestion usuarios',
            'gestion roles',
            'gestion horarios',
            'consulta horarios',
            'gestion carreras',
            'manage users',
            'create schedules',
        ];

        // Crear permisos sin duplicar
        foreach ($permissions as $perm) {
            Permission::firstOrCreate(['name' => $perm, 'guard_name' => 'web']);
        }

        // Roles y sus permisos
        $rolesWithPermissions = [
            'Administrador' => Permission::all()->pluck('name')->toArray(),
            'Coordinador Académico' => ['gestion horarios', 'consulta horarios', 'gestion carreras'],
            'Docente' => ['consulta horarios'],
            'Estudiante' => [],
            'admin' => Permission::all()->pluck('name')->toArray(),
            'user' => ['consulta horarios'],
        ];

        // Crear roles y asignar permisos
        foreach ($rolesWithPermissions as $roleName => $perms) {
            $role = Role::firstOrCreate(['name' => $roleName, 'guard_name' => 'web']);
            $role->syncPermissions($perms);
        }

        // Crear usuarios de ejemplo y asignarles roles
        $adminUser = User::firstOrCreate(
            ['email' => 'admin@example.com'],
            ['name' => 'Admin User', 'password' => bcrypt('password')]
        );
        $adminUser->assignRole('Administrador');

        $regularUser = User::firstOrCreate(
            ['email' => 'user@example.com'],
            ['name' => 'Regular User', 'password' => bcrypt('password')]
        );
        $regularUser->assignRole('user');

        $testUser = User::firstOrCreate(
            ['email' => 'test@example.com'],
            ['name' => 'Test User', 'password' => bcrypt('password')]
        );
    }
}
