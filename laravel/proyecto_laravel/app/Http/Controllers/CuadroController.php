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

    //Quiero crear una vista para el admin donde aparezcan todos los cuadros con un botón de eliminar al lado de cada uno. Al hacer click en el botón, se eliminará el cuadro de la base de datos y se redirigirá a la galería con un mensaje de éxito.
    public function admin()
    {
        // Recuperamos todos los cuadros de la BD usando Eloquent ORM
        $cuadros = Cuadro::all(); 

        // Devolvemos la vista 'admin' y le pasamos los datos con compact()
        return view('admin', compact('cuadros')); 
    }

    public function destroy($id)
    {
        // Encontramos el cuadro por su ID
        $cuadro = Cuadro::findOrFail($id);

        // Eliminamos el cuadro de la base de datos
        $cuadro->delete();

        // Redirigimos de vuelta a la galería con un mensaje de éxito
        return redirect()->route('home')->with('success', 'Cuadro eliminado correctamente.');
    }
}
