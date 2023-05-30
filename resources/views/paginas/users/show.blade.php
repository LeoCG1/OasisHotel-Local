@extends('layouts.app')
@section('titulo', 'Dashboard')
@section('contenido')

<div class="container">
    @include('layouts.navdashboard')
    <div class="row text-center">
        <div class="col-12 mb-5">
            <h1>Panel Usuario</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12 col-md-4">
            <div class="card border-primary mb-3">
                <div class="card-header border-primary fw-bold">Usuario
                    @if(session('usuario')->admin)
                    @if($user->admin)
                    <form action="{{ route('admins.destroy', $user->admin->id) }}" method="post" style="display: inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm float-end">Desasignar Administración</button>
                    </form>
                    @else
                    <button type="button" class="btn btn-success btn-sm float-end" data-bs-toggle="modal" data-bs-target="#adminModal">
                        Asignar Administración
                    </button>
                    @endif
                    @endif

                </div>
                <div class="card-body border-primary table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <td>{{ $user->id }}</td>
                            </tr>
                            <tr>
                                <th>Nombre</th>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <th>E-mail</th>
                                <td>{{ $user->email }}</td>
                            </tr>
                        </thead>
                    </table>
                </div>
                <div class="card-footer border-primary text-body-secondary">
                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#userModal">
                        Editar
                    </button>
                @if(!$user->staff)
                @if(session('usuario')->admin)
                <button type="button" class="btn btn-info btn-sm float-end" data-bs-toggle="modal" data-bs-target="#empleadoModal">
                        Crear Empleado
                    </button>
                @endif
                @else
                <a href="{{ route('staff.show', $user->staff->id) }}" class="btn btn-info btn-sm float-end">Zona Empleado</a>
                @endif
                </div>
            </div>

        </div>

        <div class="col-sm-12 col-md-8">
            <div class="card border-warning mb-3">
                <div class="card-header border-warning fw-bold">Reservas <a href="{{ route('reservation.create') }}" class="btn btn-warning btn-sm float-end">Hacer reserva</a> </div>
                <div class="card-body border-warning table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Num. Personas</th>
                                <th>Fecha de ingreso</th>
                                <th>Fecha de salida</th>
                                <th>Pagos On-line</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($reservation as $reserva)
                            <tr>

                                <td>{{ $reserva->personas }}</td>
                                <td>{{ $reserva->fecha_ingreso }}</td>
                                <td>{{ $reserva->fecha_salida }}</td>
                                @if($reserva)

                                <td>
                                    @if($reserva->client_id)
                                    Cliente Asignado
                                    @else
                                    <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#clienteModal">
                                        Asignar Cliente
                                    </button>
                                    @endif
                                </td>


                                <td>
                                    <a href="{{ route('reservation.show', $reserva->id) }}" class="btn btn-primary btn-sm">Ver</a>
                                    <form action="{{ route('reservation.destroy', $reserva->id) }}" method="post" style="display: inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                                    </form>
                                </td>
                                @endif
                            </tr>
                            @empty 
                            <p>No tiene hecha ninguna reserva.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card border-danger mb-3">
                <div class="card-header border-danger fw-bold">Clientes <button type="button" class="btn btn-danger btn-sm float-end" data-bs-toggle="modal" data-bs-target="#newclientModal">
                        Nuevo Cliente
                    </button></div>
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
                            @forelse($clients as $client)
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
                            @empty
                            <p>No tiene ningún cliente creado.</p>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="adminModal" tabindex="-1" aria-labelledby="adminModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="adminModalLabel">Administrador</h1>
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
                                            <div class="form-group mb-3">
                                                <p class="text-center">Va ha hacer administrador a {{ $user->name }}</p>
                                                <p class="text-center">¿Esta seguro?</p>
                                                <input type="text" value="{{ $user->name }}" id="nombre" class="form-control" name="nombre" required hidden>
                                                @if ($errors->has('nombre'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('nombre') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="text" value="{{ $user->id }}" id="user_id" class="form-control" name="user_id" required hidden>
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
    <!-- Modal -->
    <div class="modal fade" id="empleadoModal" tabindex="-1" aria-labelledby="empleadoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="empleadoModalLabel">Crear Empleado</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cotainer">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('staff.store') }}" method="post">
                                            @csrf
                                            <div class="form-group mb-3">
                                                <input type="text" placeholder="Nombre" name="nombre" id="nombre" class="form-control">
                                                @if ($errors->has('nombre'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('nombre') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="text" placeholder="Apellidos" name="apellidos" id="apellidos" class="form-control">
                                                @if ($errors->has('apellidos'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('apellidos') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="fecha_nac">Fecha de nacimiento</label>
                                                <input type="date" name="fecha_nac" id="fecha_nac" class="form-control">
                                                @if ($errors->has('fecha_nac'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('fecha_nac') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="text" placeholder="Direccion" name="direccion" id="direccion" class="form-control">
                                                @if ($errors->has('direccion'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('direccion') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="email" placeholder="Email" name="email" id="email" class="form-control">
                                                @if ($errors->has('email'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                            <select class="form-select mb-3" aria-label="Default select example" id="p_trabajo" name="p_trabajo">
                                                <option selected>-Puesto de trabajo-</option>
                                                <option value="Limpieza">Limpieza</option>
                                                <option value="Mantenimiento">Mantenimiento</option>
                                                <option value="Contabilidad">Contabilidad</option>
                                                <option value="Restaurante">Restaurante</option>
                                                <option value="Recepcion">Recepción</option>
                                            </select>
                                            @if ($errors->has('p_trabajo'))
                                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('p_trabajo') }}</div>
                                            @endif
                                                <input type="hidden" name="user_id" id="user_id" value="{{ $user->id }}">
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
    <!-- Modal -->
    <div class="modal fade" id="userModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="userModalLabel">Editar Usuario</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cotainer">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('users.update', $user->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group mb-3">
                                                <input type="text" placeholder="Nombre" name="name" id="name" class="form-control" @if(isset($user) && $user->name) value="{{ old('name', $user->name) }}" @endif>
                                                @if ($errors->has('name'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('name') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="email" placeholder="Email" name="email" id="email" class="form-control" @if(isset($user) && $user->email) value="{{ old('email', $user->email) }}" @endif>
                                                @if ($errors->has('email'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                            <div class="form-group mb-3">
                                                <input type="password" placeholder="Contraseña" name="password" id="password" class="form-control" value="{{ old('password') }}">
                                                @if ($errors->has('password'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('password') }}</div>
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

    <!-- Modal -->
    <div class="modal fade" id="clienteModal" tabindex="-1" aria-labelledby="clienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="clienteModalLabel">Elija cliente</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cotainer">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        @isset($reserva)
                                        <form action="{{ route('asignarCliente', $reserva->id) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="form-group mb-3">
                                                <p class="text-center">Como cliente podrá hacer más funciones On-line</p>
                                                <div class="mb-3">
                                                    <input type="date" id="fecha_ingreso" name="fecha_ingreso" value="{{$reserva->fecha_ingreso}}" hidden>
                                                    <input type="date" id="fecha_salida" name="fecha_salida" value="{{ $reserva->fecha_salida }}" hidden>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="number" id="personas" name="personas" value="{{ $reserva->personas }}" hidden>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" id="tipo_habitacion" name="tipo_habitacion" value="{{ $reserva->tipo_habitacion}}" hidden>
                                                </div>
                                                <div class="mb-3">
                                                    <input type="text" id="user_id" name="user_id" value="{{ $reserva->user_id}}" hidden>
                                                </div>
                                                <div class="mb-3">
                                                    <select name="client_id" id="client_id" class="mx-auto d-block">
                                                        <option value="">--Seleccione Cliente--</option>
                                                        @foreach($clients as $client)
                                                        <option value="{{ $client->dni }}">{{$client->dni}} {{$client->nombre}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="d-flex justify-content-evenly">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary">Seguir</button>
                                                </div>
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



    <!-- Modal -->
    <div class="modal fade" id="newclientModal" tabindex="-1" aria-labelledby="newclientModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="newclientModalLabel">Cliente Nuevo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="cotainer">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <form action="{{ route('clients.store')}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="dni" class="form-label">DNI</label>
                                                <input type="text" class="form-control" id="dni" name="dni" placeholder="Escriba su DNI">
                                                @if ($errors->has('dni'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('dni') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Escriba su nombre">
                                                @if ($errors->has('nombre'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('nombre') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="apellidos" class="form-label">Apellidos</label>
                                                <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Escriba su apellido">
                                                @if ($errors->has('apellidos'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('apellidos') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="direccion" class="form-label">Direccion</label>
                                                <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Escriba su dirección">
                                                @if ($errors->has('direccion'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('direccion') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="telefono" class="form-label">Teléfono</label>
                                                <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Escriba su telefono">
                                                @if ($errors->has('telefono'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('telefono') }}</div>
                                                @endif
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">E-mail</label>
                                                <input type="email" class="form-control" id="email" name="email" placeholder="Escriba su E-mail">
                                                @if ($errors->has('email'))
                                                <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('email') }}</div>
                                                @endif
                                            </div>
                                            <select class="form-select mb-3" aria-label="Default select example" id="tipo_cliente" name="tipo_cliente">
                                                <option selected>Tipo de cliente</option>
                                                <option value="privado">Privado</option>
                                                <option value="agencia">Agencia</option>
                                            </select>
                                            @if ($errors->has('tipo_cliente'))
                                            <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('tipo_cliente') }}</div>
                                            @endif
                                            <div class="mb-3 text-center">
                                                <input type="text" value="{{ $user->id}}" id="user_id" name="user_id" hidden>

                                                <div class="d-flex justify-content-evenly">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-primary btn-block">Aceptar</button>
                                                </div>
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