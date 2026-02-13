<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function __invoke()
    {
        return  "<h1>Bienvenido a mi aplicación laravel desde el controlador</h1>";
    }
}
