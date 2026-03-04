<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCuadroRequest;
use App\Models\Cuadro;
use Illuminate\Http\Request;

class CuadroController extends Controller
{
    public function index()
    {
        $cuadros = Cuadro::orderBy('created_at', 'desc')->paginate(12); 
        return view('galeria', compact('cuadros')); 
    }

    public function create()
    {
        return view('cuadros.create');
    }

    // Crea un Cuadro nuevo
    public function store(StoreCuadroRequest $request)
    {
        Cuadro::create($request->all());
         return redirect()->route('home');
    }

    
     public function edit(Cuadro $cuadro)
    {
        
        return view('cuadros.edit', compact('cuadro'));
    }

    public function update(Request $request, Cuadro $cuadro)
    {

    
         $request->validate([
            'nombre' => "required|string|max:255|unique:cuadros,nombre,{$cuadro->id}",
            'autor' => 'required|string',
            'epocaPintura' => 'required|string',
            'urlImg' => 'required|url|max:255',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'autor.required' => 'El autor es obligatorio.',
            'epocaPintura.required' => 'La época de pintura es obligatoria.',
            'urlImg.required' => 'La URL de la imagen es obligatoria.',
            'urlImg.url' => 'La URL de la imagen debe ser una URL válida.',
        ]);

        $cuadro->update($request->all());
        return redirect()->route('home');
    }

    public function show(Cuadro $cuadro)
    {
        return view('cuadros.show', compact('cuadro'));
    }

    public function destroy($id)
    {
        $cuadro = Cuadro::find($id);
        $cuadro->delete();
        return redirect()->route('home');
    }
}
