<?php

namespace App\Http\Controllers;

use App\Models\Voto;
use Illuminate\Http\Request;

class VotoController extends Controller
{
     public function store(Request $request)
    {
        Voto::create($request->all());

    }
}
