@extends('layouts.app')
@section('titulo', 'Formulario Empleado')
@section('contenido')

<div class="container">
@include('layouts.navdashboard')
<div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Registro</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-dark mb-3">
                <div class="card-header border-dark fw-bold">Formulario de Empleado <a href="{{ URL::previous() }}" class="btn btn-secondary btn-sm float-end mx-2 volver">Volver</a></div>
                <div class="card-body border-dark">
                    @if(isset($staff->id))
                        <form action="{{ route('staff.update', $staff->id) }}" method="post">
                        @method('PUT')
                    @else
                        <form action="{{ route('staff.store') }}" method="post">
                    @endif
                        @csrf
                        <div class="form-group mb-3">
                        <input type="text" placeholder="Nombre" name="nombre" id="nombre" class="form-control" @if(isset($staff) && $staff->nombre) value="{{ old('nombre', $staff->nombre) }}" @endif>
                        @if ($errors->has('nombre'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('nombre') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <input type="text" placeholder="Apellidos" name="apellidos" id="apellidos" class="form-control" @if(isset($staff) && $staff->apellidos) value="{{ old('apellidos', $staff->apellidos) }}" @endif>
                        @if ($errors->has('apellidos'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('apellidos') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <label for="fecha_nac">Fecha de nacimiento</label>
                        <input type="date" name="fecha_nac" id="fecha_nac" class="form-control" @if(isset($staff) && $staff->fecha_nac) value="{{ old('fecha_nac', $staff->fecha_nac) }}" @endif>
                        @if ($errors->has('fecha_nac'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('fecha_nac') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <input type="text" placeholder="Direccion" name="direccion" id="direccion" class="form-control" @if(isset($staff) && $staff->direccion) value="{{ old('direccion', $staff->direccion) }}" @endif>
                        @if ($errors->has('direccion'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('direccion') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <input type="email" placeholder="Email" name="email" id="email" class="form-control" @if(isset($staff) && $staff->email) value="{{ old('email', $staff->email) }}" @endif>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('email') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <select name="p_trabajo" id="p_trabajo" class="form-select">
                            @if(isset($staff) && $staff->p_trabajo)
                            <option value="{{ old('p_trabajo', $staff->p_trabajo) }}">{{ old('p_trabajo', $staff->p_trabajo) }}</option>
                            @else
                            <option value="">--Seleccione el puesto de trabajo--</option>
                            @endif
                            <option value="Limpieza">Limpieza</option>
                            <option value="Mantenimiento">Mantenimiento</option>
                            <option value="Recepcion">Recepción</option>
                            <option value="Restaurante">Restaurante</option>
                            <option value="Contabilidad">Contabilidad</option>
                        </select>
                        @if ($errors->has('p_trabajo'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('p_trabajo') }}</div>
                        @endif
                        </div>
                        @if(session('usuario')->admin)
                        <div class="form-group mb-3">
                            <label for="user_id">Usuario</label>
                            <select name="user_id" id="user_id" class="form-control">
                                <option value="">--Elija Usuario--</option>
                                @foreach($users as $user)
                                <option value="{{ $user->id }}">{{ $user->name }}  Id. {{ $user->id }}</option>
                                @endforeach
                            </select>
                        </div>
                        @endif
                        <div class="float-end">
                        <button type="submit" class="btn btn-primary btn-block btn-sm">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection