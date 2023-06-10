@extends('templates.master')

@section('title') Comentarios @endsection

@section('contenido-principal')
<div class="row mt-2">
    <div class="col">
        <a href="{{route('estudiante.propuestas.index')}}" class="btn btn-secondary">Atras</a>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <h5> Comentarios de la propuesta #{{ $propuesta->id }}</h5>
    </div>
</div>
<div class="row mt-2">
    <div class="col">
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Profesor</th>
                <th scope="col">Fecha</th>
                <th scope="col">Hora</th>
                <th scope="col">Comentario</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comentarios as $comentario)
                <tr>
                    <td class="align-middle">{{ $comentario->propuesta_id }}</td>
                    <td class="align-middle">{{ $comentario->profesor_rut }}</td>
                    <td class="align-middle">{{ $comentario->fecha }}</td>
                    <td class="align-middle">{{ $comentario->hora }}</td>
                    <td class="align-middle">{{ $comentario->comentario }}</td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
