@extends('templates.master')

@section('title') Subir Propuesta @endsection

@section('contenido-principal')
<div class="row mt-2">
    <div class="col">
        <a href="{{route('estudiante.propuestas.index')}}" class="btn btn-secondary">Atras</a>
    </div>
</div>
<div class="row">
    <div class="col mt-2">
        
        <form action="{{route('estudiante.propuestas.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="estudiante">Lista de estudiantes</label>
                <select id="estudiante" name="estudiante" class="form-control">
                    @foreach($estudiantes as $estudiante)
                    <option value="{{$estudiante->rut}}">{{$estudiante->nombre}}</option>
                    @endforeach
                </select>
            </div>
            <label for="propuesta" class="form-label">Sube tu propuesta en formato PDF:</label>
            <input class="form-control form-control-lg" id="propuesta" name="propuesta" type="file">
            <button class="btn btn-success mt-3" type="submit">Subir</button>
        </form>
    </div>
</div>
@endsection
