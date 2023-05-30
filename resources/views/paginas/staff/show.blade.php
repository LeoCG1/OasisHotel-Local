@extends('layouts.app')
@section('titulo', 'Empleado')
@section('contenido')
@include('paginas/staff/calendar')
@php
$calendar = new Calendar();
@endphp
@php
foreach($staff->schedule as $horario){
    $calendar->add_event($horario->franja_horaria, $horario->pivot->fecha, 1, 'green');
}
@endphp
@php
foreach($staff->room as $hab){
    $calendar->add_event($hab->descripcion . ' Nº '. $hab->num_habitacion . ' P '.$hab->piso_id, $hab->pivot->fecha_staff, 1, 'blue');
    if($hab->pivot->hora){
        $calendar->add_event($hab->descripcion . ' Nº '. $hab->num_habitacion . ' P '.$hab->piso_id, $hab->pivot->fecha_staff, 1, 'red');
    }

}
@endphp
<div class="container">
    @include('layouts.navdashboard')
    <div class="row text-center">
        @isset ($staff->unreadNotifications[0])
        <div class="contenedorCampana">
            <a href="{{ url('/staff/'.$staff->id.'#notificaciones') }}"><img src="/iconos/campana.png" id="campana"></a>
            <p>Tiene notificaciones!</p>
        </div>
        @endisset
        <div class="col-12 mb-5">
            <h1>Panel Empleado</h1>@isset($staff->user_id)<a href="{{ route('users.show', $staff->user_id) }}" class="btn btn-secondary col-12 col-sm-2 col-lg-1 btn-sm float-end m-2 volver">Volver</a>@endisset
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-8">
            <div class="card border-dark  mb-3">
                <div class="card-header border-dark fw-bold">Empleado <a class="btn btn-warning btn-sm float-end" href="{{ route('staff.edit', $staff) }}">Edita</a></div>
                <div class="card-body border-dark table-responsive">
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>Nombre</th>
                            <td>{{ $staff->nombre }}</td>
                        </tr>
                        <tr>
                            <th>Apellidos</th>
                            <td>{{ $staff->apellidos }}</td>
                        </tr>
                        <tr>
                            <th>Fecha de nacimiento</th>
                            <td>{{ $staff->fecha_nac }}</td>
                        </tr>
                        <tr>
                            <th>Dirección</th>
                            <td>{{ $staff->direccion }}</td>
                        </tr>
                        <tr>
                            <th>E-mail</th>
                            <td>{{ $staff->email }}</td>
                        </tr>
                        <tr>
                            <th>Puesto de trabajo</th>
                            <td>{{ $staff->p_trabajo }}</td>
                        </tr>

                    </table>
                </div>
                <div class="card-footer border-dark text-body-secondary">
                <a href="{{ route('descargarManual') }}" class="btn btn-info btn-sm float-end">Manual de Usuario</a>
                </div>
            </div>
        </div>
        @if(session('usuario')->admin)
        <div class="col-sm-12 col-md-4">
            <div class="card border-success  mb-3">
                <div class="card-header border-success fw-bold">Asignar Horario</div>
                <div class="card-body border-success">
                    <form action="{{ route('horarioAssign', $staff) }}" method="post">
                        @csrf
                        <div id="masFechas">
                            <div class="mb-3">
                                <label for="fecha_horario">Fecha </label>
                                <input class="form-control mb-3" type="date" id="fecha_horario" name="fecha_horario">
                            </div>
                        </div>
                        <a id="ponerMasFechas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
                                <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
                                <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z" />
                            </svg> Fechas</a>
                        <a id="quitarMasFechas"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-patch-minus" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M5.5 8a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5z" />
                                <path d="m10.273 2.513-.921-.944.715-.698.622.637.89-.011a2.89 2.89 0 0 1 2.924 2.924l-.01.89.636.622a2.89 2.89 0 0 1 0 4.134l-.637.622.011.89a2.89 2.89 0 0 1-2.924 2.924l-.89-.01-.622.636a2.89 2.89 0 0 1-4.134 0l-.622-.637-.89.011a2.89 2.89 0 0 1-2.924-2.924l.01-.89-.636-.622a2.89 2.89 0 0 1 0-4.134l.637-.622-.011-.89a2.89 2.89 0 0 1 2.924-2.924l.89.01.622-.636a2.89 2.89 0 0 1 4.134 0l-.715.698a1.89 1.89 0 0 0-2.704 0l-.92.944-1.32-.016a1.89 1.89 0 0 0-1.911 1.912l.016 1.318-.944.921a1.89 1.89 0 0 0 0 2.704l.944.92-.016 1.32a1.89 1.89 0 0 0 1.912 1.911l1.318-.016.921.944a1.89 1.89 0 0 0 2.704 0l.92-.944 1.32.016a1.89 1.89 0 0 0 1.911-1.912l-.016-1.318.944-.921a1.89 1.89 0 0 0 0-2.704l-.944-.92.016-1.32a1.89 1.89 0 0 0-1.912-1.911l-1.318.016z" />
                            </svg> Ocultar</a>
                        <div class="input-group">
                            <select name="schedule_id" id="schedule_id" class="form-select">
                                <option value="">--Seleccione un horario--</option>
                                @foreach($horarios as $horario)
                                <option value="{{ $horario->id }}">{{ $horario->franja_horaria }}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('schedule_id'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('schedule_id') }}</div>
                            @endif
                            <button type="submit" class="btn btn-success btn-block btn-sm">Asignar</button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="card border-success  mb-3">
                <div class="card-header border-success fw-bold">Asignar Habitación</div>
                <div class="card-body border-success">
                    <form action="{{ route('habAssign', $staff) }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <select name="fecha_pivot" id="fecha_pivot" class="form-select">
                                <option value="">--Horarios Asignados--</option>
                                @foreach($staff->schedule as $horario)
                                <option value="{{ $horario->pivot->fecha }}">{{ $horario->franja_horaria }} -- {{ $horario->pivot->fecha }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="input-group mb-3">
                            <select name="room_id" id="room_id" class="form-select">
                                <option value="">--Seleccione habitación--</option>
                                @foreach($habitaciones as $habitacion)
                                <option value="{{ $habitacion->id }}">{{ $habitacion->descripcion }} Nº {{ $habitacion->num_habitacion }} Planta {{$habitacion->piso_id ?? 0}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('room_id'))
                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('room_id') }}</div>
                            @endif
                        </div>
                        <div class="input-group input-group-sm mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-sm">Hora</span>
                            </div>
                            <input type="time" class="form-control" name="hora" id="hora" aria-label="Small" aria-describedby="inputGroup-sizing-sm">
                        </div>
                        <button type="submit" class="btn btn-success btn-block btn-sm float-end">Asignar</button>

                    </form>

                </div>
            </div>
        </div>
        @endif
    </div>
    <div class="row">
        <div class="col-12">
        <nav class="navtop">
	    	<div>
	    		<h1>Calendario</h1>
	    	</div>
	    </nav>
		<div class="content home mb-3">
			<?=$calendar?>
		</div>
        </div>
    </div>


    @isset($staff->unreadNotifications[0])
    <div class="row text-center">
        <div class="col-12">
            <h1 id="notificaciones">Notificaciones</h1>
        </div>
    </div>
    @endisset
    <div class="row">
        <div class="col-12">
            @foreach ($staff->unreadNotifications as $notis)
            @if($notis->type == "App\Notifications\SolicitarNotification")
            <div class="card mb-3">
                <div class="card-header">
                    Solicitud cambio de horario
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $notis->data['data']}}</p>
                    </blockquote>
                    <div>
                        <form action="{{ route('denegarChange', [$staff, $notis->id]) }}" method="post" style="display: inline">
                            @csrf
                            <input type="hidden" name="notis_id" id="notis_id" value="{{ $notis->id }}">
                            <button type="submit" class="btn btn-danger btn-sm float-none">Rechazar</button>
                        </form>
                        <form action="{{ route('hacerChange', $staff) }}" method="post" style="display: inline">
                            @csrf
                            <input type="hidden" name="notis_id" id="notis_id" value="{{ $notis->id }}">
                            <button type="submit" class="btn btn-success btn-sm float-end">Aceptar</button>
                        </form>
                    </div>

                </div>
            </div>
            @endif
            @if($notis->type == "App\Notifications\AceptarNotification")
            <div class="card mb-3">
                <div class="card-header">
                    Notificación aceptación de cambio
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $notis->data['data']}}</p>
                    </blockquote>
                    <form action="{{ route('marcarSalida', $staff) }}" method="post" style="display: inline">
                        @csrf
                        <input type="hidden" name="notis_id" id="notis_id" value="{{ $notis->id }}">
                        <button type="submit" class="btn btn-success btn-sm float-end">Aceptar</button>
                    </form>
                </div>
            </div>
            @endif
            @if($notis->type == "App\Notifications\DenegarNotification")
            <div class="card mb-3">
                <div class="card-header">
                    Denegación cambio de horario
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $notis->data['data']}}</p>
                    </blockquote>
                    <form action="{{ route('marcarDenegar', $staff) }}" method="post" style="display: inline">
                        @csrf
                        <input type="hidden" name="notis_id" id="notis_id" value="{{ $notis->id }}">
                        <button type="submit" class="btn btn-success btn-sm float-end">Aceptar</button>
                    </form>
                </div>
            </div>
            @endif
            @if($notis->type == "App\Notifications\SalidaNotification")
            <div class="card mb-3">
                <div class="card-header">
                    Habitación con prioridad
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $notis->data['data']}}</p>
                    </blockquote>
                    <form action="{{ route('marcarSalida', $staff) }}" method="post" style="display: inline">
                        @csrf
                        <input type="hidden" name="notis_id" id="notis_id" value="{{ $notis->id }}">
                        <button type="submit" class="btn btn-success btn-sm float-end">Aceptar</button>
                    </form>
                </div>
            </div>
            @endif
            @endforeach
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-5">
            <div class="card border-success mb-3">
                <div class="card-header border-success fw-bold">Horario Proximos días </div>
                <div class="card-body border-success table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Horario</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($staff->schedule as $horario)
                            <tr>
                                <td>{{ $horario->pivot->fecha}}</td>
                                <td>{{ $horario->franja_horaria}}</td>
                                <td>
                                    <form action="{{ route('horarioUnassign', $staff) }}" method="post" style="display: inline">
                                        @csrf
                                        <input type="hidden" name="schedule_id" value="{{$horario->id}}">
                                        <input type="hidden" name="fecha_horario" value="{{ $horario->pivot->fecha }}">

                                        <button type="submit" class="btn btn-danger btn-sm">Desasignar</button>
                                    </form>
                                </td>
                                <td>
                                    <a class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#horarioModal-{{ $horario->id }}">Solicitar Cambio</a>
                                </td>
                            </tr>
                            @empty
                            <p>No tiene ningún horario asignado.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-7">
            <div class="card border-success mb-3">
                <div class="card-header border-success fw-bold">Habitaciones</div>
                <div class="card-body border-success table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Fecha</th>
                                <th>Habitación</th>
                                <th>Número</th>
                                <th>Planta</th>
                            </tr>
                        </thead>
                        @forelse($staff->room as $hab)
                        <tr>
                            <td>{{ $hab->pivot->fecha_staff }}</td>
                            <td>{{ $hab->descripcion }} </td>
                            <td>Nº {{ $hab->num_habitacion}}</td>
                            <td>Piso {{ $hab->piso_id ?? 0 }}</td>
                            @if($hab->pivot->hora)
                            <td style="color:white; border-radius: 50%;" class="bg-warning text-dark">{{ $hab->pivot->hora }}h</td>
                            @else 
                            <td></td>
                            @endif
                            <td>
                                <form action="{{ route('habUnassign', $staff) }}" method="post" style="display: inline">
                                    @csrf
                                    <input type="hidden" name="room_id" value="{{$hab->id}}">
                                    <input type="hidden" name="fecha_pivot" value="{{ $hab->pivot->fecha_staff}}">
                                    <button type="submit" class="btn btn-danger btn-sm">Desasignar</button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <p>No tiene ningúna habitación asignada.</p>
                        @endforelse
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    @foreach($staff->schedule as $horario)
    <div class="modal fade" id="horarioModal-{{ $horario->id }}" tabindex="-1" aria-labelledby="horarioModalLabel-{{ $horario->id }}" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="horarioModalLabel">Solicitud de cambio horario en la fecha {{ $horario->pivot->fecha }}</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cotainer">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <p>Elija un horario y le mostraremos los empleados que haya en esta fecha.</p>
                                        <form action="{{ route('empleados', $staff) }}" method="post" style="display: inline">
                                            @csrf
                                            <input type="hidden" name="nombre" id="nombre" value="{{$staff->nombre }}">
                                            <input type="hidden" name="staff_id" id="staff_id" value="{{ $staff->id }}">
                                            <input type="hidden" name="fecha_solicitada" id="fecha_solicitada" value="{{ $horario->pivot->fecha }}">
                                            <input type="hidden" name="horario_actual" id="horario_actual" value="{{ $horario->franja_horaria }}">
                                            <select name="schedule_id" id="schedule_id" class="form-select mb-3">
                                                <option value="">--Seleccione horario--</option>
                                                @foreach($horarios as $horas)
                                                @if($horas->franja_horaria != $horario->franja_horaria)
                                                <option value="{{ $horas->id }}">{{ $horas->franja_horaria }}</option>
                                                @endif
                                                @endforeach
                                            </select>
                                            @if ($errors->has('schedule_id'))
                                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('schedule_id') }}</div>
                                            @endif
                                            <div class="d-flex justify-content-evenly">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>

                                                <button type="submit" class="btn btn-primary btn-block">Enviar</button>
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
</div>


@endsection