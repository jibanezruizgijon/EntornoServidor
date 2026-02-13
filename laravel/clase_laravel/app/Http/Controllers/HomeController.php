<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke (){
      return  "<h1>Bienvenido a mi aplicación laravel desde el controlador</h1>";
    }
}
