<?php

namespace App\Http\Controllers;

use App\Models\Cuadro;
use Illuminate\Http\Request;

class CuadroController extends Controller
{
    public function index()
    {
        // Recuperamos todos los cuadros de la BD usando Eloquent ORM
        $cuadros = Cuadro::all(); 

        // Devolvemos la vista 'galeria' y le pasamos los datos con compact()
        return view('galeria', compact('cuadros')); 
    }
}
