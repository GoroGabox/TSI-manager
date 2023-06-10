@extends('templates.master')

@php
$estados = [
  0 => 'Pendiente Revisión',
  1 => 'Modificar Propuesta',
  2 => 'Rechazado',
  3 => 'Aceptado',
];
@endphp

@section('title') Estudiantes @endsection

@section('contenido-principal')
<div class="row mt-2">
    <div class="col">
        <form action="{{route('estudiante.propuestas.create')}}" method="GET">
            @csrf
            <button class="btn btn-secondary" type="submit">Agregar Propuesta</button>
        </form>
    </div>
</div>
<div class="row mt-2 d-flex justify-content-center">
    <div class="col-12 col-md-6 mb-5">
        <h5>Lista de propuestas:</h5>
        @if($propuestas->isEmpty())
            Aún no hay propuestas.
        @else
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th>Autor</th>
                <th>Fecha</th>
                <th>Estado</th>
                <th>Comentarios</th>
                </tr>
            </thead>
            <tbody>
                @foreach($propuestas as $propuesta)
                <tr>
                    <th scope="row">{{ $propuesta->id }}</th>
                    <td>{{ $estudiantes->where('rut',$propuesta->estudiante_rut)->first()->nombre }} {{ $estudiantes->where('rut',$propuesta->estudiante_rut)->first()->apellido }}</td>
                    <td>{{ $propuesta->fecha }}</td>
                    <td>{{ $estados[$propuesta->estado] }}</td>
                    <td>
                        <div class="row">
                            {{-- Ver --}}
                            <div class="col">
                                <form action="{{route('estudiante.comentarios.show',['propuesta'=>$propuesta->id])}}" method="GET">
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
        @endif
    </div>
</div>
@endsection
