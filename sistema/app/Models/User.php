<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Constantes de roles: las usan los Gates definidos en AppServiceProvider
    const ROLE_ADMINISTRADOR = 1;
    const ROLE_CLIENTE = 2;

    /**
     * Atributos asignables en masa.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Se agregó por la nueva columna role en la tabla users
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
