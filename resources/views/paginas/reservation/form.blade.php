@extends('layouts.app')
@section('titulo', 'Formulario Reserva')
@section('contenido')

<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h1 class="reservaTitulo">Reserva</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-8">
            <div class="calendario">
                <div class="calendario__info">
                    <div class="calendario__prev" id="mes_prev">&#9664</div>
                    <div class="calendario__mes" id="mes"></div>
                    <div class="calendario__anyo" id="anyo"></div>
                    <div class="calendario__next" id="mes_next">&#9654</div>
                </div>

                <div class="calendario__semana">
                    <div class="calendario__dia calendario__item">Lunes</div>
                    <div class="calendario__dia calendario__item">Martes</div>
                    <div class="calendario__dia calendario__item">Miercoles</div>
                    <div class="calendario__dia calendario__item">Jueves</div>
                    <div class="calendario__dia calendario__item">Viernes</div>
                    <div class="calendario__dia calendario__item">Sabado</div>
                    <div class="calendario__dia calendario__item">Domingo</div>
                </div>

                <div class="calendario__dias" id="dias"></div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-4 cuadroReserva">
            @if(isset($reservation->id))
            <form action="{{ route('reservation.update', $reservation->id) }}" method="post" class="formReserva">
                @method('PUT')
            @else
                <form action="{{ route('reservation.store') }}" method="post" class="formReserva">
                    @endif
                    @csrf
                    <div class="input-group mb-3">
                        <input type="date" id="fecha_ingreso" class="form-control" name="fecha_ingreso" @if(isset($reservation) && $reservation->fecha_ingreso) value="{{ old('fecha_ingreso', $reservation->fecha_ingreso) }}" @endif> ->
                        <input type="date" id="fecha_salida" class="form-control" name="fecha_salida" @if(isset($reservation) && $reservation->fecha_salida) value="{{ old('fecha_salida', $reservation->fecha_salida) }}" @endif>
                    </div>
                    @if(isset($reservation->id)) <p>Añada las habitaciones y personas</p> @endif
                    <div class="input-group mb-3">
                        <input type="number" id="personas" min="0" max="5" name="personas[]" class="form-control" placeholder="0 Adultos">
                    </div>

                    <div class="mb-3">
                        <label for="tipo_habitacion">Habitación:</label>
                        <select name="tipo_habitacion[]" id="tipo_habitacion" class="form-control">
                            <option value="">--Tipo--</option>
                            <option value="suite">Suite</option>
                            <option value="gransuite">Gran Suite</option>
                            <option value="familiar">Familiar</option>
                        </select>
                    </div>
                    @if(isset($reservation->id))
                        @foreach($reservation->room as $habitacion)
                            <input type="hidden" name="room_id[]" id="room_id" value="{{$habitacion->id}}">
                        @endforeach
                    @endif
                    <div id="addinput">
                    </div>
                    <a class="float-end" id="addHabitacion"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                            <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                            <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                        </svg> Añadir Habitación</a>

                    <div class="mb-3 text-center">
                        <button type="submit" id="botonReserva" class="btn btn-warning">Reservar</button>
                    </div>
                </form>
        </div>
    </div>
<div class="row text-center">
    <div class="col-12">
        <h1 class="otrasHabitacionesReserva">Otras Habitaciones</h1>
    </div>
</div>
    <div class="row habitacionesReserva scroll-content fadeLeft">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card border-success">
            <div class="entrar">
                <a href="{{ route('suite') }}"><img src="/fotos/habitacion/bed-g3405a70a4_1280.jpg" class="card-img-top imagenEntrar img-fluid" alt="foto habitación familiar"></a>
                <div class="iconoEntrarHab">
                    <img src="/iconos/entrar.png" class="iconoEntrar img-fluid">
                </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Suite</h5>
                    <div class="iconosHabitacionReservas">
                        <img src="/iconos/familia (1).png" class="img-fluid" alt="icono de una familia">
                        <img src="/iconos/cama.png" class="img-fluid" alt="icono de una cama doble" class="iconoCentro">
                    </div>
                    <a href="{{ route('suite') }}" class="btn btn-primary mx-auto d-block verMasReserva">Ver Más</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card border-success">
            <div class="entrar">
                <a href="{{ route('gransuite') }}"><img src="/fotos/habitacion/bedroom-ga50455b85_1280.jpg" class="card-img-top imagenEntrar img-fluid" alt="foto habitación gran suite"></a>
                <div class="iconoEntrarHab">
                    <img src="/iconos/entrar.png" class="iconoEntrar img-fluid">
                </div>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Gran Suite</h5>
                    <div class="iconosHabitacionReservas">
                        <img src="/iconos/familia (1).png" class="img-fluid" alt="icono de una familia">
                        <img src="/iconos/cama.png" class="img-fluid" alt="icono de una cama doble" class="iconoCentro">
                        <img src="/iconos/cama individual.png" class="img-fluid" alt="icono de una cama individual">
                    </div>
                    <a href="{{ route('gransuite') }}" class="btn btn-primary mx-auto d-block verMasReserva">Ver Más</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card border-success">
            <div class="entrar">
                <a href="{{ route('familiar') }}"><img src="/fotos/habitacion/bedroom-gef7538ff0_1280.jpg" class="card-img-top imagenEntrar img-fluid" alt="foto habitación familiar"></a>
                <div class="iconoEntrarHab">
                    <img src="/iconos/entrar.png" class="iconoEntrar img-fluid">
                </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Familiar</h5>
                    <div class="iconosHabitacionReservas">
                        <img src="/iconos/familia.png" class="img-fluid" alt="icono de una familia numerosa">
                        <img src="/iconos/hotel-con-cama-grande.png" class="img-fluid" alt="icono de una cama grande" class="iconoCentro">
                        <img src="/iconos/cama.png" class="img-fluid" alt="icono de una cama doble">
                    </div>
                    <a href="{{ route('familiar') }}" class="btn btn-primary mx-auto d-block verMasReserva">Ver Más</a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container text-center">
    <div class="row scroll-content fadeTop">
      <div class="col-12">
        <img src="/fotos/Oasis.png" class="logoAbajo img-fluid" alt="logo hotel oasis">
      </div>
    </div>
  </div>


@endsection