<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCuadroRequest;
use App\Models\Cuadro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CuadroController extends Controller
{
    public function index()
    {
        $cuadros = Cuadro::with('miVoto')->orderBy('created_at', 'desc')->paginate(9);
        return view('cuadros.index', compact('cuadros'));
    }

    public function create()
    {
        return view('cuadros.create');
    }


    public function store(StoreCuadroRequest $request)
    {
        $cuadro = $request->validated();


        if ($request->hasFile('urlImg')) {


            $foto = $request->file('urlImg');


            $nombreArchivo = $foto->getClientOriginalName();


            $rutaImagen = $foto->storeAs('img', $nombreArchivo, 'public');


            $cuadro['urlImg'] = $rutaImagen;
        }


        Cuadro::create($cuadro);

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
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'autor.required' => 'El autor es obligatorio.',
            'epocaPintura.required' => 'La época de pintura es obligatoria.',
        ]);

        $cuadro->update($request->all());
        return redirect()->route('home');
    }

    public function ranking()
    {
        $cuadros = Cuadro::withAvg('votos', 'puntuacion')
            ->orderByDesc('votos_avg_puntuacion') 
            ->paginate(9);
        return view('ranking', compact('cuadros'));
    }

    public function show(Cuadro $cuadro)
    {
        return view('cuadros.show', compact('cuadro'));
    }

    public function destroy($id)
    {
        $cuadro = Cuadro::find($id);

        // se comprueba si la imagen no empieza por 'http' 
        if (!str_starts_with($cuadro->urlImg, 'http')) {
            Storage::disk('public')->delete($cuadro->urlImg);
        }
        $cuadro->delete();
        return redirect()->route('home');
    }
}
