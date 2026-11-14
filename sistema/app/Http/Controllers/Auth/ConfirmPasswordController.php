<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ConfirmsPasswords;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class ConfirmPasswordController extends Controller implements HasMiddleware
{
    use ConfirmsPasswords;

    protected $redirectTo = '/home';

    /**
     * Laravel 12: el controlador base ya no tiene ->middleware(), por eso se
     * implementa HasMiddleware en lugar de usar $this->middleware() en el constructor.
     */
    public static function middleware(): array
    {
        return [new Middleware('auth')];
    }
}
