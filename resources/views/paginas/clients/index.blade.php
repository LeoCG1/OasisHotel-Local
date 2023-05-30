@extends('layouts.app')
@section('titulo', 'Listado Clientes')
@section('contenido')

<div class="container">
@include('layouts.navdashboard')
@if(session('usuario')->admin)
<div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Indice de Clientes</h1>
        </div>
    </div>
    <div class="row">
    <div class="col-12">
                <div class="card border-danger mb-3">
                    <div class="card-header border-danger fw-bold">Clientes  <span class="float-end">Total : {{$total_clients}}</span><a href="{{ route('clients.create') }}" class="btn btn-info btn-sm float-end mx-2">Nuevo Cliente</a></div>
                    <div class="card-body border-danger table-responsive">
                        <table class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th>DNI</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th>Dirección</th>
                                    <th>Teléfono</th>
                                    <th>E-mail</th>
                                    <th>Tipo</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->dni }}</td>
                                <td>{{ $client->nombre }}</td>
                                <td>{{ $client->apellidos }}</td>
                                <td>{{ $client->direccion }}</td>
                                <td>{{ $client->telefono }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->tipo_cliente }}</td>
                                <td>
                                <a href="{{ route('clients.show', $client->dni) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <form action="{{ route('clients.destroy', $client->dni) }}" method="post" style="display: inline">
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