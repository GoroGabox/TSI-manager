@extends('templates.master')

@section('contenido-principal')
{{-- titulo --}}
<div class="row mt-2">
    <div class="col-8">
        <h3>Agregar Comentario</h3>
    </div>
    <div class="col">
        <form action="{{route('profesor.comentarios.show',['propuesta'=>$propuesta->id])}}" method="GET">
            @csrf
            <button class="btn btn-secondary" type="submit">Atras</button>
        </form>
    </div>
</div>
{{-- formulario --}}
<div class="col">
    <div class="card">
        <div class="card-header bg-dark text-white">Ingrese comentario</div>
        <div class="card-body">
            <form method="POST" action="{{route('profesor.comentarios.store',$propuesta->id)}}">
                @csrf
                {{-- profesores --}}
                <div class="mb-3">
                    <label class="form-label" for="profesor">Lista de Profesores</label>
                    <select id="profesor" name="profesor" class="form-control">
                        @foreach($profesores as $profesor)
                        <option value="{{$profesor->rut}}">{{$profesor->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                {{-- comentario --}}
                <div class="mb-3">
                    <label for="comentario" class="form-label">Comentario</label>
                    <input type="text" id="comentario" name="comentario" class="form-control">
                </div>
                {{-- propuesta --}}
                <input type="hidden" id="propuesta_id" name="propuesta_id" value="{{ $propuesta->id }}">
                {{-- botones --}}
                <div class="mb-3 d-grid gap-2 d-lg-block">
                    <button class="btn btn-warning" type="reset">Cancelar</button>
                    <button class="btn btn-success" type="submit">Agregar</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
