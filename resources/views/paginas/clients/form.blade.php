@extends('layouts.app')
@section('titulo', 'Formulario Cliente')
@section('contenido')

<div class="container">
@include('layouts.navdashboard')
<div class="row">
    <div class="col-12">
    <h1>Formulario Clientes</h1><a href="{{ URL::previous() }}" class="btn btn-secondary btn-sm float-end mx-2 volver">Volver</a>
    </div>
</div>
    <div class="row">
    <div class="col-12">
                <div class="card border-danger mb-3">
                    <div class="card-header fw-bold">Edición</div>
                    <div class="card-body">
                    @if(isset($client->dni))
                        <form action="{{ route('clients.update', $client->dni) }}" method="post">
                        @method('PUT')
                    @else
                        <form action="{{ route('clients.store') }}" method="post">
                    @endif
                        @csrf
                        <div class="form-group mb-3">
                        <input type="text" placeholder="DNI" name="dni" id="dni" class="form-control" @if(isset($client) && $client->dni) value="{{ old('dni', $client->dni) }}" @endif>
                        @if ($errors->has('dni'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('dni') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <input type="text" placeholder="Nombre" name="nombre" id="nombre" class="form-control" @if(isset($client) && $client->nombre) value="{{ old('nombre', $client->nombre) }}" @endif>
                        @if ($errors->has('nombre'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('nombre') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <input type="text" placeholder="Apellidos" name="apellidos" id="apellidos" class="form-control" @if(isset($client) && $client->apellidos) value="{{ old('apellidos', $client->apellidos) }}" @endif>
                        @if ($errors->has('apellidos'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('apellidos') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <input type="text" placeholder="Dirección" name="direccion" id="direccion" class="form-control" @if(isset($client) && $client->direccion) value="{{ old('direccion', $client->direccion) }}" @endif>
                        @if ($errors->has('direccion'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('direccion') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <input type="number" placeholder="Teléfono" name="telefono" id="telefono" class="form-control" @if(isset($client) && $client->telefono) value="{{ old('telefono', $client->telefono) }}" @endif>
                        @if ($errors->has('telefono'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('telefono') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <input type="email" placeholder="E-mail" name="email" id="email" class="form-control" @if(isset($client) && $client->email) value="{{ old('email', $client->email) }}" @endif>
                        @if ($errors->has('email'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('email') }}</div>
                        @endif
                        </div>
                        <div class="form-group mb-3">
                        <select name="tipo_cliente" id="tipo_cliente" class="form-control">
                                <option value="">--Tipo de Cliente--</option>
                                <option value="privado">Privado</option>
                                <option value="Agencia">Agencia</option>
                        </select>
                        @if ($errors->has('tipo_cliente'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('tipo_cliente') }}</div>
                        @endif
                        </div>
                        <input type="hidden" name="user_id" id="user_id" value="{{ Auth::user()->id }}">
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