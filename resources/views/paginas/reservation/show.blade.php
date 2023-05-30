@extends('layouts.app')
@section('titulo', 'Reserva')
@section('contenido')

<div class="container">
    @include('layouts.navdashboard')
    <div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Panel Reserva</h1><a @if(isset($reservation->client_id)) href="{{ route('clients.show', $reservation->client_id) }}" @else href="{{ route('users.show', $reservation->user_id)}}" @endif class="btn btn-secondary col-12 col-sm-2 col-lg-1 btn-sm float-end m-2 volver">Volver</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-7">
            <div class="card border-warning mb-3">
                <div class="card-header border-warning fw-bold">Reserva <a href="{{ route('reservation.edit', $reservation) }}" class="btn btn-warning btn-sm float-end">Editar</a></div>
                <div class="card-body border-warning table-responsive">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>Número de personas</th>
                            <td>{{ $reservation->personas }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de ingreso</th>
                            <td>{{ $reservation->fecha_ingreso }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de salida</th>
                            <td>{{ $reservation->fecha_salida }}</td>
                        </tr>
                        <tr>
                            <th>Estado</th>
                            <td>
                                      @if($reservation->payment)
                                        Pagado
                                      @else
                                        @if($reservation->client_id)
                                        <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#pagoModal">
                                                Sin pagar
                                                </a>
                                        @else
                                            <a href="{{ route('users.show', $reservation->user_id) }}" class="btn btn-success btn-sm">
                                                Sin pagar (Asigne un cliente)
                                                </a>
                                        @endif
                                      @endif
                                      </td>

                        </tr>
                    </table>
                    <p>Habitacion /es</p>
                    <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Tipo</th>
                                <th>Número</th>
                                <th>Planta</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($reservation->room as $habitacion)
                            <tr>
                                <td>{{ $habitacion->descripcion }}</td>
                                <td>{{ $habitacion->num_habitacion }}</td>
                                <td>{{ $habitacion->planta ?? 0 }}</td>
                                @if(!$reservation->payment)
                                <td>
                                <form action="{{ route('quitarRoom', $reservation) }}" method="post" style="display: inline">
                                @csrf
                                <input name="room_id" id="room_id" value="{{ $habitacion->id }}" hidden>
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                                </td>
                                @endif
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-5">
            <div class="card border-primary mb-3">
                <div class="card-header border-primary fw-bold">Hecha por usuario...</div>
                <div class="card-body border-primary table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($users as $user)
                            <tr>
                                <td>{{ $user->id}}</td>
                                <td>{{ $user->name}}</td>
                                <td><a href="{{ route('users.show', $user->id) }}" class="btn btn-primary btn-sm">Ver</a></td>
                            </tr>
                            @empty
                            <p>No tiene ningún usuario asignado a esta reserva.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card border-danger mb-3">
                <div class="card-header border-danger fw-bold">Hecha por cliente...</div>
                <div class="card-body border-danger table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>DNI</th>
                                <th>Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($clients as $client)
                            <tr>
                                <td>{{ $client->dni}}</td>
                                <td>{{ $client->nombre}}</td>
                                <td><a href="{{ route('clients.show', $client->dni) }}" class="btn btn-primary btn-sm">Ver</a></td>
                            </tr>
                            @empty
                            <p>No tiene ningún cliente asignado a esta reserva</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

 <!-- Modal -->
 @isset($reservation)
 <div class="modal fade" id="pagoModal" tabindex="-1" aria-labelledby="pagoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="pagoModalLabel">Proceso de pago</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="cotainer">
            <div class="row justify-content-center">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <form action="{{ route('payments.store') }}" method="POST">
                      @csrf
                      <div class="form-group mb-3">
                        <label for="concepto">Concepto</label>
                        <input type="text" placeholder="Concepto" id="concepto" class="form-control" name="concepto" value="Estancia" required autofocus>
                        @if ($errors->has('concepto'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('concepto') }}</div>
                        @endif
                      </div>
                      <div class="form-group mb-3">
                        <label for="direccion">Dirección</label>
                        <input type="text" placeholder="Dirección" id="direccion" class="form-control" name="direccion" @isset($client) value="{{ $client->direccion }}" @endisset required>
                        @if ($errors->has('direccion'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('direccion') }}</div>
                        @endif
                      </div>
                      <div class="form-group mb-3">
                        <label for="num_tarjeta">Número de tarjeta</label>
                        <input type="text" placeholder="Numero de Tarjeta" id="num_tarjeta" class="form-control" name="num_tarjeta" min="0" required>
                        @if ($errors->has('num_tarjeta'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('num_tarjeta') }}</div>
                        @endif
                      </div>
                      <div class="form-group mb-3">
                        <label for="total">Total</label>
                        @php
                          $suma = 0
                        @endphp
                        @foreach($reservation->room as $habitacion)
                          @php
                            $suma += $habitacion->precio   
                          @endphp
                        @endforeach
                        <input type="text" value="{{ $suma*1.21 }}" id="total" class="form-control" name="total" required>
                        @if ($errors->has('total'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('total') }}</div>
                        @endif
                      </div>
                      <input type="hidden" name="reservation_id" id="reservation_id" value="{{ $reservation->id }}">
                      <input type="hidden" name="client_id" id="client_id" value="{{ $reservation->client_id }}">
                      <div class="d-flex justify-content-evenly">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-block">Pagar</button>
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
  @endisset
</div>


@endsection