<?php

namespace App\Http\Controllers;

use App\Models\Estado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Notifications\SolicitarNotification;
use App\Models\Staff;
use App\Models\Room;
use App\Models\User;
use App\Models\Schedule;
use App\Notifications\AceptarNotification;
use App\Notifications\DenegarNotification;
use App\Notifications\SalidaNotification;
use Illuminate\Validation\Rule;
use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $staff = Staff::all();
        $total_staff = Staff::all()->count();
        return view('/paginas/staff/index', compact('staff', 'total_staff'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::all();
        $horarios = Schedule::all();
        return view('/paginas/staff/form', compact('users', 'horarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255|',
            'fecha_nac' => 'required|date',
            'direccion' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:staff',
            'p_trabajo' => 'required',
            'user_id' => 'nullable|exists:users,id'
        ]);

        $staff = Staff::create([
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'fecha_nac' => $request->input('fecha_nac'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email'),
            'p_trabajo' => $request->input('p_trabajo'),
            'user_id' => $request->input('user_id')
        ]);
        return redirect()->route('staff.show', $staff)->with('success', 'Empleado creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Staff $staff)
    {
        $horarios = Schedule::all();
        $habitaciones = Room::all();        
        $notificaciones = $staff->notifications();
        
        return view('/paginas/staff/show', compact('staff', 'horarios', 'habitaciones', 'notificaciones'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Staff $staff)
    {
        $users = User::all();
        $horarios = Schedule::all();
        return view('/paginas/staff/form', compact('staff', 'users', 'horarios'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255|',
            'fecha_nac' => 'required|date',
            'direccion' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('staff')->ignore($staff->id)
            ],
            'p_trabajo' => 'required',
        ]);

        $staff->update([
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'fecha_nac' => $request->input('fecha_nac'),
            'direccion' => $request->input('direccion'),
            'email' => $request->input('email'),
            'p_trabajo' => $request->input('p_trabajo')
        ]);
        return redirect()->route('staff.show', $staff)->with('success', 'Empleado actualizado correctamente.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Staff $staff)
    {
        $staff->delete();
        return redirect()->route('staff.index')->with('success', 'Empleado eliminado correctamente.');
    }
    /**Leonardo Costa
     * La asignación de horario hecha por el administrador en el panel de empleado.
     * Se valida que el horario exista.
     * Se valida la ruta por donde viene, para saber si es asignar o desasignar.
     * Si fecha_horario no es null es que pone una fecha unica, si no es que ha puesto un array de fechas y iteramos sobre ellas para asignarlas todas.
     */
    public function horarioAssignation(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'schedule_id' => 'exists:schedules,id'
        ]);
       
        $rutaActual = $request->route()->getName();
        if($rutaActual == 'horarioAssign' and $request->input('fecha_horario') != null){
            $staff->schedule()->attach($request->input('schedule_id'), ['fecha' => $request->input('fecha_horario')]);
            $message = 'Horario asignado correctamente.';
        }else if ($rutaActual == 'horarioUnassign'){
            $staff->schedule()->wherePivot('fecha', $request->input('fecha_horario'))->detach($request->input('schedule_id'));
            $message = 'Horario desasignado correctamente.';
        }else{
            $principio = Carbon::createFromFormat('Y-m-d', $request->input('desde_horario'));
            $final = Carbon::createFromFormat('Y-m-d', $request->input('hasta_horario'));
            $periodo = new CarbonPeriod($principio, '1 day', $final);
            foreach($periodo as $fecha){
                $staff->schedule()->attach($request->input('schedule_id'), ['fecha' => $fecha]);
            }
            $message = 'Horarios asignados correctamente.';
        }

    	return redirect()->route('staff.show', $staff)->with('success', $message);
    }
    /**Leonardo Costa
     * Asignación de habitaciones al empleado hecha por el administrador.
     * Se valida que la habitación exista.
     * Se valida si se ha puesto una hora, para hacer la asignación con hora.
     * Si no hay hora se mira la ruta por donde viene para realizar asignación o desasignación.
     */
    public function habitacionAssignation(Request $request, Staff $staff)
    {
        $validatedData = $request->validate([
            'room_id' => 'exists:rooms,id'
        ]);
        $fecha = date("Y-m-d",strtotime($request->input('fecha_pivot')));
        $hora = $request->input('hora');
        $rutaActual = $request->route()->getName();

        if($rutaActual == 'habUnassign'){
            $staff->room()->detach($request->input('room_id'),['fecha_staff'=> $fecha]);
            $message = 'Habitación desasignada correctamente.';
        };
        $muchas_habitaciones = $staff->room()->withPivot('fecha_staff', $fecha)->count();
        if($muchas_habitaciones > 4){
            return redirect()->route('staff.show', $staff)->with('error', "El empleado ya tiene suficientes habitaciones en ese horario.");
        }
        if($request->input('hora')){
            $ocupado = Staff::select('*')
            ->whereRaw("id in (select st.id from staff st, rooms ro, staff_room sr where st.id=sr.staff_id and ro.id=sr.room_id and sr.fecha_staff='$fecha' and sr.hora='$hora' and st.id=$staff->id)")
            ->exists();
            if($ocupado){
                return redirect()->route('staff.show', $staff)->with('error', "El empleado ya tiene el día y la hora asignada.");
            }
            $staff->room()->attach($request->input('room_id'), ['fecha_staff' => $fecha, 'hora' => $request->input('hora')]);
            $staff->notify(new SalidaNotification($fecha, $request->input('hora')));
            return redirect()->route('staff.show', $staff)->with('success', "Habitación asignada correctamente.");
        }
        if($rutaActual == 'habAssign'){
            $staff->room()->attach($request->input('room_id'), ['fecha_staff' => $fecha]);
            $message = 'Habitación asignada correctamente.';
        }

    	return redirect()->route('staff.show', $staff)->with('success', $message);
    }
    /**Leonardo Costa
     * Función que enseña los empleados que tienen el horario pedido por el empleado, en la funcionalidad de cambiar horario.
     * Se valida que el horario exista y que el empleado no tenga ya esa fecha.
     * Se buscan los empleados que tengan horario solicitado en la fecha pedida, si no hay se le devuelve atras con el mensaje "no hay ningún trabajador".
     * Si hay trabajadores, se guardan en un session y se redirecciona a la vista mostrarEmpleados para listarlos.
     */
    public function mostrarEmpleados(Request $request, Staff $staff){
        $empleado_peticion = $request->input('staff_id');
        $fecha = date("Y-m-d",strtotime($request->input('fecha_solicitada')));
        $validatedData = $request->validate([
            'schedule_id' => 'exists:schedules,id'
        ]);
        $horario_solicitado = $request->input('schedule_id');
        $tiene_fecha = Staff::select('*')
        ->whereRaw("id in (select st.id from staff st, staff_schedule ss, schedules sc where ss.schedule_id=sc.id and st.id=ss.staff_id and ss.fecha='$fecha' and sc.id=$horario_solicitado and st.id=$staff->id)")
        ->get();
        if(!$tiene_fecha){
            return back()->with('error', 'Ya tiene esta fecha');
        }
        $staff_fecha = Staff::select('*')
        ->whereRaw("id in (select st.id from staff st, staff_schedule ss, schedules sc where ss.schedule_id=sc.id and st.id=ss.staff_id and ss.fecha='$fecha' and sc.id=$horario_solicitado and st.id<>$staff->id)")
        ->get();
        if(count($staff_fecha) > 0){
            $request->session()->put('staff_fecha', $staff_fecha);
            $request->session()->put('staff', $staff);
            $request->session()->put('horario_actual', $request->input('horario_actual'));
            $request->session()->put('horario_solicitado', $horario_solicitado);
            $request->session()->put('fecha', $fecha);
            return redirect()->route('mostrarEmpleados');
        }else{
            return back()->with('error', 'No hay ningún trabajador con este horario asignado');
        }
    }
    /**Leonardo Costa
     * Función para realizar la solicitud de cambio de horario al otro empleado.
     * Se valida si el horario existe. Se guardan los dos empleados, fecha y horarios a cambiar en variables.
     * Se manda una notificación al empleado para que pueda aceptar o rechazar la petición.
     * Se guardan las variables en una tabla de la base de datos llamada Estado hasta que el otro empleado acepte o rechace y se pueda o no hacer el cambio.
     * Se redirecciona al usuario a su panel de empleado.
     */
    public function solicitud(Request $request, Staff $staff){
        $nombre = $request->input('nombre');
        $empleado_peticion = $request->input('staff_id');
        $horario_actual = Schedule::all()->where('franja_horaria', $request->input('horario_actual'))->first();

        $fecha = date("Y-m-d",strtotime($request->input('fecha_solicitada')));
        $validatedData = $request->validate([
            'schedule_id' => 'exists:schedules,id'
        ]);
        $horario_solicitado = $request->input('horario_solicitado');
        $empleado_elegido = Staff::all()->where('id', $request->input('empleado_elegido'))->first();
        $franja_solicitada = Schedule::select('franja_horaria')->where('id', $horario_solicitado)->get('franja_horaria')->first();
        $empleado_elegido->notify(new SolicitarNotification($nombre, $fecha, $horario_actual->franja_horaria, $franja_solicitada->franja_horaria));
        $message = "Se le ha mandado notificación al empleado $empleado_elegido->nombre, recibirá una respuesta cuando acepte o rechaze";
        $estado = Estado::create([
            'empleado_peticion' => $empleado_peticion,
            'empleado_acepta' => $empleado_elegido->id,
            'fecha' => $fecha,
            'horario_solicitado' => $franja_solicitada->franja_horaria,
            'horario_actual' =>  $horario_actual->franja_horaria
        ]);
        return redirect()->route('staff.show', $staff)->with('success', $message);
    }
    /**Leonardo Costa
     * Función para marcar como leidas las notificaciones.
     * Si busca la ruta por donde viene, si es marcarSalida, es una notificación sin datos en BBDD, por lo tanto sólo se marca como leída y se redirecciona a su panel de empleado.
     * Si no, se busca los datos en la tabla Estado, se borran, se marca la notificación como leída y se redirecciona a su panel de empleado.
     */
    public function marcar(Request $request, Staff $staff){
        $rutaActual = $request->route()->getName();
        if($rutaActual == 'marcarSalida'){
            $id = $request->input('notis_id');
            $staff->unreadNotifications->where('id', $id)->markAsRead();
            $message = "Notificación aceptada";
            return redirect()->route('staff.show', $staff)->with('success', $message);    
        }
        $estado = Estado::all()->where('empleado_acepta', $staff->id)->first();
        if($estado){
            $estado->delete();
        }
        $id = $request->input('notis_id');
        $staff->unreadNotifications->where('id', $id)->markAsRead();
        $message = "Notificación aceptada";
        return redirect()->route('staff.show', $staff)->with('success', $message);
    }
    /**Leonardo Costa
     * Función que realiza o rechaza el cambio de horario.
     * Se valida si el cambio es todavía válido, o ha habido cambios haciendo que valide.
     * Se mira por la ruta que viene para denegar o realizar el cambio.
     * Si se deniega, se manda una notificación de denegación al empleado que lo solicitó, se borran los datos de la BBDD y se le devuelve a su panel de empleado.
     * Si acepta, se intercambian los horarios de un empleado a otro, se manda una notificación de aceptación con sus nuevos horarios,
     * se borran los datos de la BBDD y finalmente se devuelve al usuario a su panel de empleado.
     */
    public function horarioChange(Request $request, Staff $staff){
        $estado = Estado::all()->where('empleado_acepta', $staff->id)->first();
        if(!$estado){
            $id = $request->input('notis_id');
            $staff->unreadNotifications->where('id', $id)->markAsRead();
            return redirect()->route('staff.show', $staff)->with('success', 'El cambio ha expirado');
        }
        $empleado_solicita = Staff::all()->where('id', $estado->empleado_peticion)->first();
        $rutaActual = $request->route()->getName();
        if($rutaActual == 'denegarChange'){
            $empleado_solicita->notify(new DenegarNotification());
            $estado->delete();
            $message = "Se ha rechazado el cambio correctamente";
            $id = $request->input('notis_id');
            $staff->unreadNotifications->where('id', $id)->markAsRead();
            return redirect()->route('staff.show', $staff)->with('success', $message);
        }
        $fecha_solicitada = date("Y-m-d",strtotime($estado->fecha));
        $horario_actual = Schedule::all()->where('franja_horaria', $estado->horario_actual);
        $horario_solicitado = Schedule::all()->where('franja_horaria', $estado->horario_solicitado);

        $empleado_solicita->schedule()->wherePivot('fecha', $fecha_solicitada)->detach($horario_actual);
        $empleado_solicita->schedule()->attach($horario_solicitado, ['fecha' => $fecha_solicitada]);
        $staff->schedule()->wherePivot('fecha', $fecha_solicitada)->detach($horario_solicitado);
        $staff->schedule()->attach($horario_actual, ['fecha' => $fecha_solicitada]);
        $empleado_solicita->notify(new AceptarNotification($fecha_solicitada, $estado->horario_actual, $estado->horario_solicitado));
        $message = "Se ha hecho el cambio de horario en la fecha $fecha_solicitada correctamente";
        $estado->delete();
        $id = $request->input('notis_id');
        $staff->unreadNotifications->where('id', $id)->markAsRead();
        return redirect()->route('staff.show', $staff)->with('success', $message);
    }
}
