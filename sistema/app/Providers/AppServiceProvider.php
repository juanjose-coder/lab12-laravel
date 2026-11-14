<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    /**
     * En Laravel 11/12 ya no existe AuthServiceProvider:
     * los Gates se definen aquí, en el método boot().
     */
    public function boot(): void
    {
        // Acción "mantenimiento": solo el rol administrador está autorizado
        Gate::define('mantenimiento', function (User $user) {
            return $user->role == User::ROLE_ADMINISTRADOR;
        });

        // Acción "pedidos": solo el rol cliente está autorizado
        Gate::define('pedidos', function (User $user) {
            return $user->role == User::ROLE_CLIENTE;
        });
    }
}
