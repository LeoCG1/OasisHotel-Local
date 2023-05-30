@extends('layouts.app')
@section('titulo', 'Empleados para escoger')
@section('contenido')

<div class="container altura">
@include('layouts.navdashboard')
<div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Empleados con horarios en la fecha {{ Session::get('fecha') }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-dark mb-3">
                <div class="card-header border-dark fw-bold">Empleados <a href="{{ URL::previous() }}" class="btn btn-info btn-sm float-end mx-2 volver">Volver</a></div>
                <div class="card-body border-dark table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Puesto de trabajo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(Session::get('staff_fecha') as $empleado)
                            <tr>
                                <td>{{ $empleado->nombre }}</td>
                                <td>{{ $empleado->apellidos }}</td>
                                <td>{{ $empleado->p_trabajo }}</td>
                                <td>
                                <form action="{{ route('solicitud', $empleado) }}" method="post" style="display: inline">
                                            @csrf
                                            <input type="hidden" name="nombre" id="nombre" value="{{ Session::get('staff')->nombre}}">
                                            <input type="hidden" name="staff_id" id="staff_id" value="{{ Session::get('staff')->id }}">
                                            <input type="hidden" name="fecha_solicitada" id="fecha_solicitada" value="{{ Session::get('fecha') }}">
                                            <input type="hidden" name="horario_actual" id="horario_actual" value="{{ Session::get('horario_actual')  }}">
                                            <input type="hidden" name="horario_solicitado" id="horario_solicitado" value="{{ Session::get('horario_solicitado') }}">
                                            <input type="hidden" name="empleado_elegido" id="empleado_elegido" value="{{ $empleado->id }}">
                                                <button type="submit" class="btn btn-primary btn-block">Enviar Solicitud</button>
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
</div>
@endsection