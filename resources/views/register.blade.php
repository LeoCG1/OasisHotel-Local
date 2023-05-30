@extends('layouts.app')
@section('titulo', 'Registro')
@section('contenido')

<div class="cotainer altura" style="width: 99%;">
  <div class="row justify-content-center">
    <div class="col-md-4" style="margin-top: 5%;">
      <div class="card">
        <h3 class="card-header text-center">Formulario Registro</h3>
        <div class="card-body">
          <form action="{{ route('pregister') }}" method="post">
            @csrf
            <div class="form-group mb-3">
              <input type="text" placeholder="Nombre" class="form-control" id="name" name="name" value="{{ old('name') }}">
              @if ($errors->has('name'))
              <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('name') }}</div>
              @endif
            </div>
            <div class="form-group mb-3">
              <input type="email" placeholder="Correo Electrónico" class="form-control" id="email" name="email" value="{{ old('email') }}">
              @if ($errors->has('email'))
              <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('email') }}</div>
              @endif
            </div>
            <div class="form-group mb-3">
              <input type="password" placeholder="password" class="form-control" id="password" name="password">
              @if ($errors->has('password'))
              <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('password') }}</div>
              @endif
            </div>
            <div class="form-group mb-3">
              <input type="password" placeholder="Confirmar Contraseña" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="d-grid mx-auto">
              <button type="submit" class="btn btn-primary btn-block">Registrarse</button>
            </div>
            <div class="d-grid mx-auto mt-2">
              <a href="/" class="btn btn-secondary btn-block">Cancelar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>


@endsection