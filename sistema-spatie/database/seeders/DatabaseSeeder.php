<?php

namespace Database\Seeders;

use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class DatabaseSeeder extends Seeder
{
    /**
     * Reemplaza los pasos hechos a mano con "php artisan tinker" en la guía:
     * crea roles, permisos, usuarios y una nota de ejemplo.
     */
    public function run(): void
    {
        // Limpia la caché de permisos de Spatie
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // ---- Permisos ----
        Permission::firstOrCreate(['name' => 'destroy_notes']); // Actividad 3
        Permission::firstOrCreate(['name' => 'validar_venta']); // Guía Spatie (empleado)

        // ---- Roles ----
        $administrator = Role::firstOrCreate(['name' => 'Administrator']);
        $administrator->givePermissionTo('destroy_notes');

        Role::firstOrCreate(['name' => 'cliente']);

        $empleado = Role::firstOrCreate(['name' => 'empleado']);
        $empleado->givePermissionTo('validar_venta');

        // ---- Usuarios de prueba (password: 12345678) ----
        $admin = User::firstOrCreate(
            ['email' => 'admin@styde.net'],
            ['name' => 'Styde', 'password' => '12345678']
        );
        $admin->assignRole('Administrator');

        // Joe: sin rol ni permisos (para comprobar que no puede eliminar notas)
        User::firstOrCreate(
            ['email' => 'joe@example.com'],
            ['name' => 'Joe', 'password' => '12345678']
        );

        $cliente = User::firstOrCreate(
            ['email' => 'cliente@example.com'],
            ['name' => 'Cliente', 'password' => '12345678']
        );
        $cliente->assignRole('cliente');

        $empl = User::firstOrCreate(
            ['email' => 'empleado@example.com'],
            ['name' => 'Empleado', 'password' => '12345678']
        );
        $empl->assignRole('empleado');

        // ---- Nota de ejemplo ----
        Note::create([
            'title' => 'Titulo de la nota',
            'content' => 'Contenido de la nueva nota',
        ]);
    }
}
