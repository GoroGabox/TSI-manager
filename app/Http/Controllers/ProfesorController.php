<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use App\Models\Profesor;
use App\Models\Propuesta;
use App\Models\Profesor_Propuesta;

class ProfesorController extends Controller
{
    public function index()
    {
        $propuestas = Propuesta::all();
        return view('profesores.index', compact('propuestas'));
    }

    public function download(Propuesta $propuesta)
    {
        $path = $propuesta->documento;
        return Storage::download($path);
    }

    public function showComentario(Propuesta $propuesta)
    {
        $comentarios = Profesor_Propuesta::where('propuesta_id', $propuesta->id)->get();

        return view('profesores.comentarios.show', compact('comentarios', 'propuesta'));
    }

    public function createComentario(Propuesta $propuesta)
    {
        $profesores = Profesor::all();
        $propuesta = Propuesta::find($propuesta->id);

        return view('profesores.comentarios.create', compact('profesores', 'propuesta'));
    }

    public function storeComentario(Request $request, Propuesta $propuesta)
    {
        $comentario = new Profesor_Propuesta();
        $comentario->propuesta_id = $propuesta->id;
        $comentario->profesor_rut = $request->input('profesor');
        $comentario->fecha = now()->format('Y-m-d');
        $comentario->hora = now()->format('H:i:s');
        $comentario->comentario = $request->comentario;
        $comentario->save();

        return redirect()->route('profesores.index');
    }

    public function destroyComentario($profesor, $id)
{

    $comentario = Profesor_Propuesta::where('profesor_rut', $profesor)
                                    ->where('propuesta_id', $id);

    $comentario->delete();

    return redirect()->route('profesores.index');
}
}
