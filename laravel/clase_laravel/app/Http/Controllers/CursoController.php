<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CursoController extends Controller
{
    public function show($curso){
      return  "<h1>Estás viendo el curso: $curso</h1>";
    }
}
