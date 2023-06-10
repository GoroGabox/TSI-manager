@extends('templates.master')

@section('title') Comentarios @endsection

@section('contenido-principal')
{{-- titulo --}}
<div class="row mt-2">
    <div class="col">
        <a href="{{route('profesores.index')}}" class="btn btn-secondary">Atras</a>
    </div>
</div>
<div class="row mt-2">
     {{-- añadir --}}
     <div class="col">
        <form action="{{ route('profesor.comentarios.create', $propuesta->id) }}" method="GET">
            @csrf
            <button class="btn btn-sm btn-warning pb-0 text-white" type="submit">Añadir comentario</button>
        </form>
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
                <th scope="col">Actions</th>
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
                    <td>
                        <div class="row">
                            {{-- eliminar --}}
                            <div class="col">
                                <form action="{{ route('profesor.comentarios.destroy', [$comentario->profesor_rut, $comentario->propuesta_id]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger pb-0 text-white" type="submit">Eliminar comentario</button>
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
