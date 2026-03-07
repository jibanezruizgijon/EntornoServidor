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
        // 1. Validar que la puntuación sea un número del 1 al 5
        $request->validate([
            'puntuacion' => 'required|integer|min:1|max:5',
        ]);

        // 2. Comprobar si este usuario ya ha votado este cuadro
        $votoExistente = Voto::where('user_id', Auth::id())
                             ->where('cuadro_id', $cuadro->id)
                             ->first();

        // Si ya existe un voto, lo devolvemos a la galería con un mensaje de error
        if ($votoExistente) {
            return back()->with('error', 'Ya has votado el cuadro "' . $cuadro->nombre . '" anteriormente.');
        }

        // 3. Si no ha votado, creamos el voto en la base de datos
        Voto::create([
            'puntuacion' => $request->puntuacion,
            'user_id' => Auth::id(),
            'cuadro_id' => $cuadro->id,
        ]);

        // 4. Redirigimos a la página anterior (la galería) con un mensaje de éxito
        return back();
    

    }
}
