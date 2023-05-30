@extends('layouts.app')
@section('titulo', 'Cliente')
@section('contenido')

<div class="container">
  @include('layouts.navdashboard')
  <div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Panel Clientes</h1>  <a href="{{ route('users.show', $client->user_id) }}" class="btn btn-secondary col-12 col-sm-2 col-lg-1 btn-sm float-end m-2 volver">Volver</a>
        </div>
    </div>
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-7">
      <div class="card border-danger mb-3">
        <div class="card-header border-danger fw-bold">Cliente <a href="{{ route('clients.edit', $client) }}" class="btn btn-warning btn-sm float-end">Editar</a></div>
        <div class="card-body border-danger table-responsive">
          <table class="table table-hover table-striped">
            <tr>
              <th>DNI</th>
              <td>{{ $client->dni }}</td>
            </tr>
            <tr>
              <th>Nombre</th>
              <td>{{ $client->nombre }}</td>
            </tr>
            <tr>
              <th>Apellidos</th>
              <td>{{ $client->apellidos }}</td>
            </tr>
            <tr>
              <th>Dirección</th>
              <td>{{ $client->direccion }}</td>
            </tr>
            <tr>
              <th>Teléfono</th>
              <td>{{ $client->telefono }}</td>
            </tr>
            <tr>
              <th>E-mail</th>
              <td>{{ $client->email }}</td>
            </tr>
            <tr>
              <th>Tipo</th>
              <td>{{ $client->tipo_cliente }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-12 col-lg-5">
      <div class="card border-warning mb-3">
        <div class="card-header border-warning fw-bold">Reservas</div>
        <div class="card-body border-warning table-responsive">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>Nº Personas</th>
                <th>Fecha de ingreso</th>
                <th>Fecha de salida</th>
                <th>Estado</th>
              </tr>
            </thead>
            <tbody>
              @foreach($reservation as $reserva)
              <tr>
                <td>{{ $reserva->personas }}</td>
                <td>{{ $reserva->fecha_ingreso }}</td>
                <td>{{ $reserva->fecha_salida }}</td>
                <td>
                  @if($reserva->payment)
                    Pagado
                  @else
                  <a class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#pagoModal-{{ $reserva->id }}">
                    Pagar
                  </a>
                  @endif
                </td>
                <td><a href="{{ route('reservation.show', $reserva->id) }}" class="btn btn-primary btn-sm">Ver</a></td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-12">
      <div class="card border-info mb-3">
        <div class="card-header border-info fw-bold">Pagos</div>
        <div class="card-body border-info table-responsive">
          <table class="table table-hover table-striped">
            <thead>
              <tr>
                <th>DNI</th>
                <th>Concepto</th>
                <th>Dirección</th>
                <th>Nº Tarjeta</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @forelse($payment as $pago)
              <tr>
                <td>{{ $pago->concepto }}</td>
                <td>{{ $pago->direccion }}</td>
                <td>{{ $pago->num_tarjeta }}</td>
                <td>{{ $pago->total }}</td>
                @if(session('usuario')->admin)
                <td>
                  <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#paymentModal">
                    Editar
                  </button>

                </td>
                <td>
                  <form action="{{ route('payments.destroy', $pago->id) }}" method="post" style="display: inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                  </form>
                </td>
                @endif
                <td>
                  <a href="{{ route('descargaPDF', $pago->id) }}" class="btn btn-info btn-sm">Descargar Factura</a>
                
                </td>
              </tr>
              @empty
              <p>No tiene pagos</p>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
@foreach($reservation as $reserva)
  <!-- Modal -->
  <div class="modal fade" id="pagoModal-{{ $reserva->id }}" tabindex="-1" aria-labelledby="pagoModalLabel-{{ $reserva->id }}" aria-hidden="true">
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
                        <input type="text" placeholder="Dirección" id="direccion" class="form-control" name="direccion" value="{{ $client->direccion }}" required>
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
                        @foreach($reserva->room as $habitacion)
                          @php
                            $suma += $habitacion->precio   
                          @endphp
                        @endforeach
                        <input type="text" value="{{ $suma*1.21 }}" id="total" class="form-control" name="total" readonly>
                        @if ($errors->has('total'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('total') }}</div>
                        @endif
                      </div>
                      <div class="form-group mb-3">
                        <label for="dni">DNI</label>
                        <input type="text" id="client_id" class="form-control" name="client_id" value="{{$client->dni}}" readonly>
                        @if ($errors->has('client_id'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('client_id') }}</div>
                        @endif
                      </div>
                      <input type="hidden" name="reservation_id" id="reservation_id" value="{{ $reserva->id }}">
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
@endforeach
  <!-- Modal -->
  <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="paymentModalLabel">Editar Pago</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="cotainer">
            <div class="row justify-content-center">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    @isset($pago)
                    <form action="{{ route('payments.update', $pago->id) }}" method="POST">
                      @method('PUT')
                      @csrf
                      <div class="form-group mb-3">
                        <input type="text" placeholder="Concepto" id="concepto" class="form-control" name="concepto" value="{{ old('concepto', $pago->concepto) }}" required autofocus>
                        @if ($errors->has('concepto'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('concepto') }}</div>
                        @endif
                      </div>
                      <div class="form-group mb-3">
                        <input type="text" placeholder="Dirección" id="direccion" class="form-control" name="direccion" value="{{ old('direccion', $pago->direccion) }}" required>
                        @if ($errors->has('direccion'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('direccion') }}</div>
                        @endif
                      </div>
                      <div class="form-group mb-3">
                        <input type="text" placeholder="Numero de Tarjeta" id="num_tarjeta" class="form-control" name="num_tarjeta" value="{{ old('num_tarjeta', $pago->num_tarjeta) }}" required>
                        @if ($errors->has('num_tarjeta'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('num_tarjeta') }}</div>
                        @endif
                      </div>
                      <div class="form-group mb-3">
                        <input type="text" placeholder="Total" id="total" class="form-control" name="total" value="{{ old('total', $pago->total) }}" required>
                        @if ($errors->has('total'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('total') }}</div>
                        @endif
                      </div>
                      <div class="form-group mb-3">
                        <input type="text" placeholder="DNI" id="client_id" class="form-control" name="client_id" value="{{ $client->dni }}" readonly>
                        @if ($errors->has('client_id'))
                        <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('client_id') }}</div>
                        @endif
                      </div>
                      <input type="hidden" id="reservation_id" class="form-control" name="reservation_id" value="{{ old('reservation_id', $pago->reservation_id) }}">

                      <div class="d-flex justify-content-evenly">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                      </div>
                    </form>
                    @endisset
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