@extends('layouts.app')
@section('titulo', 'Listado Usuarios')
@section('contenido')

<div class="container">
    @include('layouts.navdashboard')
    <div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Indice de Usuarios</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-primary mb-3">
                <div class="card-header border-primary fw-bold">Usuarios <span class="float-end">Total : {{$total_user}}</span></div>
                <div class="card-body border-primary table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->id }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="post" style="display: inline">
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
</div>


@endsection