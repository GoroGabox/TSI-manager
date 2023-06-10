@extends('templates.master')

@php
$estados = [
  0 => 'Pendiente Revisión',
  1 => 'Modificar Propuesta',
  2 => 'Rechazado',
  3 => 'Aceptado',
];
@endphp

@section('title') Profesores @endsection

@section('hojas-estilo') <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" /> @endsection

@section('contenido-principal')

<div class="row mt-2 d-flex justify-content-center">
    <div class="col-12 mb-5">
        <h2 class="text-center mt-5">Añadir comentarios a propuestas</h2>
        <h5 class="text-center mt-3 mb-5">A continuación todas las propuestas de los estudiantes:</h5>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Fecha</th>
                <th scope="col">Estado</th>
                <th scope="col">Estudiante</th>
                <th scope="col">Descargar</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($propuestas as $propuesta)
                <tr>
                    <td class="align-middle">{{ $propuesta->id }}</td>
                    <td class="align-middle">{{ $propuesta->fecha }}</td>
                    <td class="align-middle">{{ $estados[$propuesta->estado] }}</td>
                    <td class="align-middle">{{ $propuesta->estudiante_rut }}</td>
                    <td class="align-middle">
                        <a href="{{route('profesor.propuesta.download',['propuesta'=>$propuesta])}}" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip" data-bs-title="Editar profesor">
                            <span class="material-symbols-outlined">download</span>
                        </a>
                    </td>
                    <td>
                        <div class="row">
                            {{-- Ver --}}
                            <div class="col">
                                <form action="{{route('profesor.comentarios.show',['propuesta'=>$propuesta->id])}}" method="GET">
                                    @csrf
                                    <button class="btn btn-sm btn-primary pb-0 text-white" type="submit">Ver comentarios</button>
                                </form>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
