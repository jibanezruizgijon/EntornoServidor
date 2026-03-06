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
        return view('cuadros.index', compact('cuadros')); 
    }

    public function create()
    {
        return view('cuadros.create');
    }

    // Crea un Cuadro nuevo
    public function store(StoreCuadroRequest $request)
    {
        $datos = $request->validated();

        // 2. Comprobamos si el usuario ha subido una foto
        if ($request->hasFile('urlImg')) {
            
            // 3. Obtenemos el archivo de la foto
            $foto = $request->file('urlImg');

            // 4. Sacamos el nombre original que tenía la foto en tu ordenador (ej: "mi_perro.jpg")
            $nombreArchivo = $foto->getClientOriginalName();

            // 5. Guardamos la foto en la carpeta 'img' (storage/app/public/img) CON SU NOMBRE ORIGINAL
            $rutaImagen = $foto->storeAs('img', $nombreArchivo, 'public');
            
            // 6. Cambiamos el dato del array para que en la base de datos se guarde la ruta buena (ej: "img/mi_perro.jpg")
            $datos['urlImg'] = $rutaImagen;
        }

        // 7. Creamos el cuadro en la base de datos usando el array $datos (ya corregido)
        Cuadro::create($datos);

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
            'urlImg' => 'required|image',
        ], [
            'nombre.required' => 'El nombre es obligatorio.',
            'autor.required' => 'El autor es obligatorio.',
            'epocaPintura.required' => 'La época de pintura es obligatoria.',
            'urlImg.required' => 'La imagen es obligatoria.',
            'urlImg.image' => 'El archivo debe ser una imagen.',
        ]);

        $cuadro->update($request->all());
        return redirect()->route('home');
    }

    public function ranking()
    {
        $cuadros = Cuadro::withCount('votos')
            ->orderByDesc('votos_count')
            ->get();

        return view('ranking', compact('cuadros'));
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
