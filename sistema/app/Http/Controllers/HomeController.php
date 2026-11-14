<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    /**
     * La protección con "auth" se aplica en routes/web.php
     * (en Laravel 12 el controlador base ya no trae ->middleware()).
     */
    public function index()
    {
        return view('home');
    }
}
