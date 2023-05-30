@extends('layouts.app')
@section('titulo', 'Listado Reservas')
@section('contenido')

<div class="container">
@include('layouts.navdashboard')
@if(session('usuario')->admin)
<div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Indice de Reservas</h1>
        </div>
    </div>
    <div class="row">
    <div class="col-12">
                <div class="card border-warning mb-3">
                    <div class="card-header border-warning fw-bold">Reservas  <span class="float-end">Total : {{$total_reservas}}</span></div>
                    <div class="card-body border-warning table-responsive">
                        <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Usuario</th>
                                <th>Cliente</th>
                                <th>Personas</th>
                                <th>Fecha de ingreso</th>
                                <th>Fecha de salida</th>
                                <th>Habitación/es</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservation as $reserva)
                                <tr>
                                    <td>{{ $reserva->user_id }}</td>
                                    <td>{{ $reserva->client_id }}</td>
                                    <td>{{ $reserva->personas }}</td>
                                    <td>{{ $reserva->fecha_ingreso }}</td>
                                    <td>{{ $reserva->fecha_salida }}</td>
                                    @foreach($reserva->room as $habitacion)
                                    <td>{{ $habitacion->descripcion }}</td>
                                    @endforeach
                                    <td>
                                        <a href="{{ route('reservation.show', $reserva->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                        <form action="{{ route('reservation.destroy', $reserva->id) }}" method="post" style="display: inline">
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