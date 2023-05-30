@if(session('usuario')->admin)
<div id="adminBarra" class="adminNormal"><p id="abrirBarra">Admin</p>
    <a href="{{ route('users.index') }}"><img src="/iconos/usuario.png" class="iconosAdmin img-fluid" alt="icono de usuario" title="Usuarios"></a>
    <a href="{{ route('admins.index') }}"><img src="/iconos/administracion.png" class="iconosAdmin img-fluid" alt="icono de administración" id="iconoAdmin" title="Administradores"></a>
    <a href="{{ route('clients.index') }}"><img src="/iconos/cliente.png" class="iconosAdmin img-fluid" alt="icono de cliente" title="Clientes"></a>
    <a href="{{ route('reservation.index') }}"><img src="/iconos/reserva.png" class="iconosAdmin img-fluid" alt="icono de reservas" id="iconoRes" title="Reservas"></a>
    <a href="{{ route('staff.index') }}"><img src="/iconos/empleado.png" class="iconosAdmin img-fluid" alt="icono empleados" title="Empleados"></a>
    <img src="/iconos/cerrar-ventana.png" class="img-fluid" alt="icono cerrar" id="cerrarBarra">     
    </div>
@endif