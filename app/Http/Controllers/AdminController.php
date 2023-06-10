<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use App\Models\Profesor;
use App\Models\Propuesta;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Obtener todos los estudiantes
        $estudiantes = Estudiante::all();

        // Obtener todos los profesores
        $profesores = Profesor::all();

        // Obtener todas las propuestas
        $propuestas = Propuesta::all();

        return view('admin.index', compact('estudiantes', 'profesores', 'propuestas'));
    }

    // Estudiantes

    public function createEstudiante()
    {
        return view('admin.estudiantes.create');
    }

    public function storeEstudiante(Request $request)
    {   
        $estudiante = new Estudiante();
        $estudiante->rut = $request->rut;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->email = $request->email;
        $estudiante->save();

        return redirect()->route('admin.index');
    }

    public function editEstudiante(Estudiante $estudiante)
    {
        return view('admin.estudiantes.edit', compact('estudiante'));
    }

    public function updateEstudiante(Request $request, Estudiante $estudiante)
    {
        $estudiante->rut = $request->rut;
        $estudiante->nombre = $request->nombre;
        $estudiante->apellido = $request->apellido;
        $estudiante->email = $request->email;
        $estudiante->save();

        return redirect()->route('admin.index');
    }

    public function destroyEstudiante(Estudiante $estudiante)
    {
        $estudiante->delete();

        return redirect()->route('admin.index');
    }

    // Profesores

    public function createProfesor()
    {
        return view('admin.profesores.create');
    }

    public function storeProfesor(Request $request)
    {
        $profesor = new Profesor();
        $profesor->rut = $request->rut;
        $profesor->nombre = $request->nombre;
        $profesor->apellido = $request->apellido;
        $profesor->save();

        return redirect()->route('admin.index');
    }

    public function editProfesor(Profesor $profesor)
    {
        return view('admin.profesores.edit', compact('profesor'));
    }

    public function updateProfesor(Request $request, Profesor $profesor)
    {
        $profesor->rut = $request->rut;
        $profesor->nombre = $request->nombre;
        $profesor->apellido = $request->apellido;
        $profesor->save();

        return redirect()->route('admin.index');
    }

    public function destroyProfesor(Profesor $profesor)
    {
        $profesor->delete();

        return redirect()->route('admin.index');
    }

    // Propuestas

    public function cambiarEstadoPropuesta(Request $request, Propuesta $propuesta)
    {

        $propuesta->estado = $request->input('estado');
        $propuesta->save();

        return redirect()->route('admin.index');
    }
}
