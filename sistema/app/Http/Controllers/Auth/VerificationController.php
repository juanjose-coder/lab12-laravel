<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\VerifiesEmails;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class VerificationController extends Controller implements HasMiddleware
{
    use VerifiesEmails;

    protected $redirectTo = '/home';

    /**
     * Laravel 12: el controlador base ya no tiene ->middleware(), por eso se
     * implementa HasMiddleware en lugar de usar $this->middleware() en el constructor.
     */
    public static function middleware(): array
    {
        return [
            new Middleware('auth'),
            new Middleware('signed', only: ['verify']),
            new Middleware('throttle:6,1', only: ['verify', 'resend']),
        ];
    }
}
