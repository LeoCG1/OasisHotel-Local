@extends('layouts.app')
@section('titulo', 'Listado Administradores')
@section('contenido')

<div class="container altura">
@include('layouts.navdashboard')
@if(session('usuario')->admin)
<div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Indice de Administradores</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-light mb-3">
                <div class="card-header fw-bold">Administradores<a class="btn btn-info btn-sm mx-2 float-end" data-bs-toggle="modal" data-bs-target="#newAdminModal">Asignar un nuevo Admin</a>  <span class="float-end">Total : {{$total_admins}}</span></div>
                <div class="card-body table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Num. Usuario</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->user_id }}</td>
                                <td>{{ $admin->nombre }}</td>
                                <td>
                                <a href="{{ route('users.show', $admin->user_id) }}" class="btn btn-primary btn-sm">Ver</a>
                                <form action="{{ route('admins.destroy', $admin->id) }}" method="post" style="display: inline">
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
                <div class="card-footer border-dark text-body-secondary">
                <a href="{{ route('descargarManual') }}" class="btn btn-info btn-sm float-end">Manual de Usuario</a>
                </div>
            </div>
        </div>
@endif
    </div>
        <!-- Modal -->
        <div class="modal fade" id="newAdminModal" tabindex="-1" aria-labelledby="newAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newAdminModalLabel">Nuevo Administrador</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cotainer">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('admins.store') }}" method="POST">
                                            @csrf
                                            <div class="input-group mb-3">
                                                <select name="user_id" id="user_id" class="form-select">
                                                    <option value="">--Seleccione un usuario--</option>
                                                    @foreach($users as $user)
                                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                    <option value="{{ $user->name }}" hidden></option>
                                                    @endforeach
                                                </select>
                                                @if ($errors->has('user_id'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('user_id') }}</div>
                                                @endif
                                            </div>

                                            <div class="d-flex justify-content-evenly">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary btn-block">Seguir</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection