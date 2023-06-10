@extends('templates.master')

@section('title') Admin @endsection

@section('hojas-estilo') <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet" /> @endsection

@section('contenido-principal')
<div class="row my-5 d-flex justify-content-center">
    <div class="col text-center">
        <h1>Panel del Administrador</h1>
    </div>
</div>
<div class="row d-flex justify-content-center">
    <div class="col-6 mb-5">
        <h3>Estudiantes</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>RUT</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $index => $estudiante)
                <tr>
                    <td class="align-middle">{{$index+1}}</td>
                    <td class="align-middle">{{$estudiante->rut}}</td>
                    <td class="align-middle">{{$estudiante->apellido}}</td>
                    <td class="align-middle">{{$estudiante->nombre}}</td>
                    <td class="align-middle">{{$estudiante->email}}</td>
                    <td>
                        <div class="row">
                            {{-- borrar --}}
                            <div class="col text-end">
                                <form method="POST" action="{{route('admin.estudiantes.destroy',$estudiante->rut)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </form>
                            </div>
                            {{-- editar --}}
                            <div class="col">
                                <a href="{{route('admin.estudiantes.edit',$estudiante->rut)}}" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip" data-bs-title="Editar estudiante">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{route('admin.estudiantes.create')}}" method="GET">
            @csrf
            <button class="btn btn-secondary" type="submit">Agregar Estudiante</button>
        </form>
    </div>
    <div class="col-6 mb-5">
        <h3>Profesores</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>N°</th>
                    <th>RUT</th>
                    <th>Apellido</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($profesores as $index => $profesor)
                <tr>
                    <td class="align-middle">{{$index+1}}</td>
                    <td class="align-middle">{{$profesor->rut}}</td>
                    <td class="align-middle">{{$profesor->apellido}}</td>
                    <td class="align-middle">{{$profesor->nombre}}</td>
                    <td>
                        <div class="row">
                            {{-- borrar --}}
                            <div class="col text-end">
                                <form method="POST" action="{{route('admin.profesores.destroy',$profesor->rut)}}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <span class="material-symbols-outlined">delete</span>
                                    </button>
                                </form>
                            </div>
                            {{-- editar --}}
                            <div class="col">
                                <a href="{{route('admin.profesores.edit',['profesor'=>$profesor])}}" class="btn btn-sm btn-warning pb-0 text-white" data-bs-toggle="tooltip" data-bs-title="Editar profesor">
                                    <span class="material-symbols-outlined">edit</span>
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <form action="{{route('admin.profesores.create')}}" method="GET">
            @csrf
            <button class="btn btn-secondary" type="submit">Agregar Profesor</button>
        </form>
    </div>
</div>
<div class="row mt-2 d-flex justify-content-center">
    <div class="col-12 col-md-8 my-5">
        <h3>Propuestas:</h3>
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>RUT</th>
                    <th>Fecha</th>
                    <th>Estado</th>
                    <th>Confirmar Cambio</th>
                </tr>
            </thead>
            <tbody>
                @foreach($propuestas as $propuesta)
                <tr>
                    <td class="align-middle">{{$propuesta->id}}</td>
                    <td class="align-middle">{{$propuesta->estudiante_rut}}</td>
                    <td class="align-middle">{{$propuesta->fecha}}</td>
                    <td>
                    {{-- editar estado propuesta --}}
                    <form action="{{route('admin.propuestas.cambiarEstado',$propuesta->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <select id="estado" name="estado" class="form-control">
                            <option value="0" {{ $propuesta->estado == 0 ? 'selected' : '' }}>Pendiente Revisión</option>
                            <option value="1" {{ $propuesta->estado == 1 ? 'selected' : '' }}>Modificar Propuesta</option>
                            <option value="2" {{ $propuesta->estado == 2 ? 'selected' : '' }}>Rechazada</option>
                            <option value="3" {{ $propuesta->estado == 3 ? 'selected' : '' }}>Aceptada</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-success pb-0 text-white" type="submit">
                            <span class="material-symbols-outlined">done</span>
                        </button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
