<?php

namespace App\Http\Controllers;

use App\Models\Cuadro;
use App\Models\Voto;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class VotoController extends Controller
{
     public function store(Request $request, Cuadro $cuadro)
    {
        $request->validate([
            'puntuacion' => 'required|integer|min:1|max:5',
        ]);

        $votoExistente = Voto::where('user_id', Auth::id())
                             ->where('cuadro_id', $cuadro->id)
                             ->first();
 
        if ($votoExistente) {
            return back()->with('error', 'Ya has votado el cuadro "' . $cuadro->nombre . '" anteriormente.');
        }

        Voto::create([
            'puntuacion' => $request->puntuacion,
            'user_id' => Auth::id(),
            'cuadro_id' => $cuadro->id,
        ]);

        return back();
    

    }
}
