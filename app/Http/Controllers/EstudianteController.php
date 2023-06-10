<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Estudiante;
use App\Models\Propuesta;
use App\Models\Profesor_Propuesta;

class EstudianteController extends Controller
{
    public function index()
    {
        $estudiantes = Estudiante::all();
        $propuestas = Propuesta::all();
        $comentarios = Profesor_Propuesta::all();

        return view('estudiantes.index', compact('estudiantes','propuestas','comentarios'));
    }

    public function showComentario($propuesta)
    {
        $propuesta = Propuesta::find($propuesta);
        $comentarios = Profesor_Propuesta::where('propuesta_id', $propuesta->id)->get();

        return view('estudiantes.propuestas.show', compact('comentarios', 'propuesta'));
    }

    public function createPropuesta()
    {
        $estudiantes = Estudiante::all();

        return view('estudiantes.propuestas.create', compact('estudiantes'));
    }

    public function storePropuesta(Request $request)
    {
        $archivo = $request->file('propuesta');

        $pathCarpeta = 'propuestas/' . $request->input('estudiante');
        $nombreArchivo = $archivo->getClientOriginalName();
        $pathArchivo = $archivo->storeAs($pathCarpeta, $nombreArchivo, 'local');

        $propuesta = new Propuesta();
        $propuesta->estudiante_rut = $request->input('estudiante');
        $propuesta->fecha = now()->format('Y-m-d H:i:s'); // Utilizamos la fecha y hora actual
        $propuesta->estado = 0;
        $propuesta->documento = $pathArchivo;
        $propuesta->save();

        return redirect()->route('estudiante.propuestas.index');
    }

}
