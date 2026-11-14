<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Crea los 2 usuarios de prueba de la Actividad 1.
     * (el modelo User hashea el password automáticamente)
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrador',
            'email' => 'admin@example.com',
            'password' => '12345678',
            'role' => User::ROLE_ADMINISTRADOR, // 1 -> ve "Mantenimiento"
        ]);

        User::create([
            'name' => 'Cliente',
            'email' => 'cliente@example.com',
            'password' => '12345678',
            'role' => User::ROLE_CLIENTE, // 2 -> ve "Pedidos"
        ]);
    }
}
