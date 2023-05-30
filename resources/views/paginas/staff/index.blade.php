@extends('layouts.app')
@section('titulo', 'Listado Empleados')
@section('contenido')

<div class="container">
@include('layouts.navdashboard')
@if(session('usuario')->admin)
<div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Indice de Empleado</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-dark mb-3">
                <div class="card-header border-dark fw-bold">Empleados  <span class="float-end">Total : {{$total_staff}}</span><a href="{{ route('staff.create') }}" class="btn btn-info btn-sm float-end mx-2">Crear Empleado</a></div>
                <div class="card-body border-dark table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Puesto de trabajo</th>
                                <th>Horario</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($staff as $empleado)
                            <tr>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->p_trabajo }}</td>
                                <td>
                                    <a href="{{ route('staff.show', $empleado->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <form action="{{ route('staff.destroy', $empleado->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endif
</div>


@endsection