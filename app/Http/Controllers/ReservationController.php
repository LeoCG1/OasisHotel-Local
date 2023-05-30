<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Clients;
use App\Models\Schedule;
use App\Models\Room;
use App\Models\Staff;
use App\Notifications\SalidaNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;
use Carbon\Carbon;
class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $reservation = Reservation::all();
        $total_reservas = Reservation::all()->count();
        return view('/paginas/reservation/index', compact('reservation', 'total_reservas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/paginas/reservation/form');
    }

    /**Leonardo Costa
     * Función que realiza la reserva y la guarda en la BBDD.
     * Se itera sobre las habitaciones elegidas para valdarlas individualmente.
     * Se busca si hay habitaciones libres de cada tipo que hay en el hotel. Si no hay libres en la fecha indicada, se le devuelve a la vista de reservas con mensaje de error.
     * Se validan las fechas de entrada, salida, que los usuarios existan y finalmente se guarda en la base de datos.
     * Se itera sobre cada habitación para asignar cada habitación libre a la reserva, y activar la funcion buscarEmpleado.
     * Finalmente se redirecciona a su panel de empleado.
     */
    public function store(Request $request)
    {

        foreach ($request->input('tipo_habitacion') as $key => $habitacion) {
            if ($habitacion == 'suite' and $request->input('personas')[$key] > 2) {
                $validatedData = $request->validate([
                    'personas' => 'required|integer',
                    'tipo_habitacion' => 'required|max:255',
                ]);
                return redirect()->back()->withErrors(['msg' => 'Más personas que capacidad']);
            }
            if ($habitacion == 'gransuite' and $request->input('personas')[$key] > 4) {
                $validatedData = $request->validate([
                    'personas' => 'required|integer',
                    'tipo_habitacion' => 'required|max:255',
                ]);
                return redirect()->back()->withErrors(['msg' => 'Más personas que capacidad']);
            }
            if ($habitacion == 'familiar' and $request->input('personas')[$key] > 5) {
                $validatedData = $request->validate([
                    'personas' => 'required|integer',
                    'tipo_habitacion' => 'required|max:255',
                ]);
                return redirect()->back()->withErrors(['msg' => 'Más personas que capacidad']);
            }
        }
        $num_suite_seleccionadas = count(array_keys($request->input('tipo_habitacion'), "suite"));
        $num_gsuite_seleccionadas = count(array_keys($request->input('tipo_habitacion'), "gransuite"));
        $num_familiar_seleccionadas = count(array_keys($request->input('tipo_habitacion'), "familiar"));
        $ingreso = $request->input('fecha_ingreso');
        $salida = $request->input('fecha_salida');
        $suites_libres = Room::select('*')
                ->whereRaw("id not in (select ro.id from rooms ro, reservation_room rero, reservations re where ro.id=rero.room_id and re.id=rero.reservation_id and re.fecha_ingreso>=$ingreso and re.fecha_salida<=$salida)")
                ->where('descripcion', 'Suite')->get();
        $gran_suites_libres = Room::select('*')
                ->whereRaw("id not in (select ro.id from rooms ro, reservation_room rero, reservations re where ro.id=rero.room_id and re.id=rero.reservation_id and re.fecha_ingreso>=$ingreso and re.fecha_salida<=$salida)")
                ->where('descripcion', 'Gran Suite')->get();
        $familiares_libres = Room::select('*')
                ->whereRaw("id not in (select ro.id from rooms ro, reservation_room rero, reservations re where ro.id=rero.room_id and re.id=rero.reservation_id and re.fecha_ingreso>=$ingreso and re.fecha_salida<=$salida)")
                ->where('descripcion', 'Familiar')->get();
        
        if((count($suites_libres) < $num_suite_seleccionadas) or (count($gran_suites_libres) < $num_gsuite_seleccionadas) or (count($familiares_libres) < $num_familiar_seleccionadas)){
            return redirect()->back()->withErrors(['msg' => 'Alguno o todos los tipos de habitaciones seleccionadas no estan disponible en la fecha indicada']);
        }
        $validatedData = $request->validate([
            'fecha_ingreso' => 'required|date',
            'fecha_salida' => 'required|date',
            'user_id' => 'nullable|exists:users,id',
            'client_id' => 'nullable|exists:clients,id'
        ]);

        $reservation = Reservation::create([
            'personas' => array_sum($request->input('personas')),
            'fecha_ingreso' => $request->input('fecha_ingreso'),
            'fecha_salida' => $request->input('fecha_salida'),
            'user_id' => auth()->user()->id,
            'client_id' => $request->input('client_id')
        ]);
        
        foreach ($request->input('tipo_habitacion') as $key => $habitacion) {
            if ($habitacion == 'suite') {
                $habitacion_suite_libre = $suites_libres->random(1);
                $reservation->room()->attach($habitacion_suite_libre);
                $this->buscarEmpleado($reservation->fecha_salida, $habitacion_suite_libre);
            }
            if ($habitacion == 'gransuite') {
                $habitacion_gsuite_libre = $gran_suites_libres->random(1);
                $reservation->room()->attach($habitacion_gsuite_libre);
                $this->buscarEmpleado($reservation->fecha_salida, $habitacion_gsuite_libre);
            }
            if ($habitacion == 'familiar') {
                $habitacion_familiar_libre = $familiares_libres->random(1);
                $reservation->room()->attach($habitacion_familiar_libre);
                $this->buscarEmpleado($reservation->fecha_salida, $habitacion_familiar_libre);
            }
        }

        $user = User::all()->where('id', $reservation->user_id)->first();
        return redirect()->route('users.show', $user)->with('success', 'Reserva creada correctamente.');
    }
    /**Leonardo Costa
     * Función que asigna un empleado de limpieza en la fecha de salida de una reserva.
     * Se busca un empleado que tenga en esa fecha y franja horaria.
     * Si hay, se mira si ya tiene ese horario y sólo le añade la hora. Si no tiene ese horario se le asigna el horario y la hora.
     * Si no hay, se elige un empleado de limpieza aleatorio y se le asigna el horario y la habitación.
     * En cada asignación se le manda una notificación con la fecha y hora de la nueva habitación asignada a su cargo.
     */
    public function buscarEmpleado($fecha_salida, $habitacion){
        $fecha_salida = date("Y-m-d",strtotime($fecha_salida));
        $empleado_libre = Staff::select('*')
            ->whereRaw("id in (select st.id from staff st, staff_schedule ss, schedules sc where ss.schedule_id=sc.id and st.id=ss.staff_id and ss.fecha='$fecha_salida' and sc.id=2)")
            ->where('p_trabajo', 'Limpieza')
            ->get();
            $horario = Schedule::all()->where('id', 2);
            $empleado_libre = $empleado_libre->filter(function ($empleado, $fecha_salida){
                $fecha = date("Y-m-d",strtotime($fecha_salida));
                $tiene_horario = Staff::select('*')
                ->whereRaw("id in (select st.id from staff st, rooms ro, staff_room sr where st.id=sr.staff_id and ro.id=sr.room_id and sr.fecha_staff='$fecha' and sr.hora='12:00' and st.id=$empleado->id)")
                ->exists();
                if($tiene_horario == false){
                    return $empleado;
                }
            });
            if(count($empleado_libre) > 0){
                $empleado_libre = $empleado_libre->random(1);
                $empleado_libre = $empleado_libre[0];
                if($empleado_libre->schedule()->where('id', $horario)->wherePivot('fecha', $fecha_salida)){
                    $empleado_libre->room()->attach($habitacion, ['fecha_staff' => $fecha_salida, 'hora' => '12:00']);
                    $empleado_libre->notify(new SalidaNotification($fecha_salida, '12:00'));
                    return;
                }
                $empleado_libre->schedule()->attach($horario, ['fecha' => $fecha_salida]);
                $empleado_libre->room()->attach($habitacion, ['fecha_staff' => $fecha_salida, 'hora' => '12:00']);
                $empleado_libre->notify(new SalidaNotification($fecha_salida, '12:00'));
                return;
            }else{
                $empleado_libre = Staff::all()->where('p_trabajo', 'Limpieza')->random(1)->first();
                $empleado_libre->schedule()->attach($horario, ['fecha' => $fecha_salida]);
                $empleado_libre->room()->attach($habitacion, ['fecha_staff' => $fecha_salida, 'hora' => '12:00']);
                $empleado_libre->notify(new SalidaNotification($fecha_salida, '12:00'));
                return;
            }
    }

    /**
     * Display the specified resource.
     */
    public function show(Reservation $reservation)
    {
        $users = User::all()->where('id', $reservation->user_id);
        $clients = Clients::all()->where('dni', $reservation->client_id);
        return view('/paginas/reservation/show')->with(compact('reservation'))->with(compact('users'))->with(compact('clients'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Reservation $reservation)
    {
        return view('/paginas/reservation/form', compact('reservation'));
    }

    /**Leonardo Costa
     * Actualización de la reserva.
     * Se mira la ruta por donde viene, si es para asignar cliente, se asigna y se redirecciona a su panel de cliente.
     * Si es para modificar reserva, se le desasignan todas sus habitaciones y se realizan los mismos pasos que para la reserva.
     */
    public function update(Request $request, Reservation $reservation)
    {
        $rutaActual = $request->route()->getName();

        if($rutaActual == 'asignarCliente'){
            $validatedData = $request->validate([
                'client_id' => 'nullable|exists:clients,dni'
            ]);
            
            $reservation->update([
                'client_id' => $request->input('client_id')
            ]);
            
            $client = Clients::all()->where('dni', $reservation->client_id)->first();
            return redirect()->route('clients.show', $client)->with('success', 'Reserva asignada correctamente');    
        }
        if($request->input('room_id')){
            foreach($request->input('room_id') as $room){
                $reservation->room()->detach($room);
            }
        }
        foreach ($request->input('tipo_habitacion') as $key => $habitacion) {
            if ($habitacion == 'suite' and $request->input('personas')[$key] > 2) {
                $validatedData = $request->validate([
                    'personas' => 'required',
                    'tipo_habitacion' => 'required|max:255',
                ]);
                return redirect()->back()->withErrors(['msg' => 'Más personas que capacidad']);
            }
            if ($habitacion == 'gransuite' and $request->input('personas')[$key] > 4) {
                $validatedData = $request->validate([
                    'personas' => 'required',
                    'tipo_habitacion' => 'required|max:255',
                ]);
                return redirect()->back()->withErrors(['msg' => 'Más personas que capacidad']);
            }
            if ($habitacion == 'familiar' and $request->input('personas')[$key] > 5) {
                $validatedData = $request->validate([
                    'personas' => 'required',
                    'tipo_habitacion' => 'required|max:255',
                ]);
                return redirect()->back()->withErrors(['msg' => 'Más personas que capacidad']);
            }
        }
        $num_suite_seleccionadas = count(array_keys($request->input('tipo_habitacion'), "suite"));
        $num_gsuite_seleccionadas = count(array_keys($request->input('tipo_habitacion'), "gransuite"));
        $num_familiar_seleccionadas = count(array_keys($request->input('tipo_habitacion'), "familiar"));
        $ingreso = $request->input('fecha_ingreso');
        $salida = $request->input('fecha_salida');
        $suites_libres = Room::select('*')
                ->whereRaw("id not in (select ro.id from rooms ro, reservation_room rero, reservations re where ro.id=rero.room_id and re.id=rero.reservation_id and re.fecha_ingreso>=$ingreso and re.fecha_salida<=$salida)")
                ->where('descripcion', 'Suite')->get();
        $gran_suites_libres = Room::select('*')
                ->whereRaw("id not in (select ro.id from rooms ro, reservation_room rero, reservations re where ro.id=rero.room_id and re.id=rero.reservation_id and re.fecha_ingreso>=$ingreso and re.fecha_salida<=$salida)")
                ->where('descripcion', 'Gran Suite')->get();
        $familiares_libres = Room::select('*')
                ->whereRaw("id not in (select ro.id from rooms ro, reservation_room rero, reservations re where ro.id=rero.room_id and re.id=rero.reservation_id and re.fecha_ingreso>=$ingreso and re.fecha_salida<=$salida)")
                ->where('descripcion', 'Familiar')->get();
        
        if((count($suites_libres) < $num_suite_seleccionadas) or (count($gran_suites_libres) < $num_gsuite_seleccionadas) or (count($familiares_libres) < $num_familiar_seleccionadas)){
            return redirect()->back()->withErrors(['msg' => 'Alguno o todos los tipos de habitaciones seleccionadas no está disponible en la fecha indicada']);
        }
        $validatedData = $request->validate([
            'fecha_ingreso' => 'required|date',
            'fecha_salida' => 'required|date',
            'user_id' => 'nullable|exists:users,id',
            'client_id' => 'nullable|exists:clients,id'
        ]);
        $num_personas = $reservation->personas + array_sum($request->input('personas'));
        $reservation->update([
            'personas' => $num_personas,
            'fecha_ingreso' => $request->input('fecha_ingreso'),
            'fecha_salida' => $request->input('fecha_salida'),
            'tipo_habitacion' => 'suite',
            'user_id' => auth()->user()->id,
            'client_id' => $request->input('client_id')
        ]);
        
        foreach ($request->input('tipo_habitacion') as $key => $habitacion) {
            if ($habitacion == 'suite') {
                $habitacion_suite_libre = $suites_libres->random(1);
                $reservation->room()->attach($habitacion_suite_libre);
                $empleado_libre = $this->buscarEmpleado($reservation->fecha_salida, $habitacion_suite_libre);
            }
            if ($habitacion == 'gransuite') {
                $habitacion_gsuite_libre = $gran_suites_libres->random(1);
                $reservation->room()->attach($habitacion_gsuite_libre);
                $empleado_libre = $this->buscarEmpleado($reservation->fecha_salida, $habitacion_gsuite_libre);
            }
            if ($habitacion == 'familiar') {
                $habitacion_familiar_libre = $familiares_libres->random(1);
                $reservation->room()->attach($habitacion_familiar_libre);
                $empleado_libre = $this->buscarEmpleado($reservation->fecha_salida, $habitacion_familiar_libre);
            }
        }
        
        return redirect()->route('reservation.show', $reservation)->with('success', 'Reserva actualizada correctamente.');
    }

    /**Leonardo Costa
     * Se borra la reserva, desasignando la habitación a los empleados que tenían esa habitación reservada en la hora de salida del usuario que ha realizado la reserva.
     */
    public function destroy(Reservation $reservation)
    {
        $staff = Staff::select('*')
        ->whereRaw("id in (select st.id from staff st, staff_room sr, rooms ro where sr.room_id=ro.id and st.id=sr.staff_id and sr.fecha_staff='$reservation->fecha_salida' and sr.hora='12:00')")
        ->get();
        foreach($staff as $empleado){
            $room = Room::select('*')
            ->whereRaw("id in (select ro.id from rooms ro, staff_room sr, staff st where ro.id=sr.room_id and st.id=sr.staff_id and fecha_staff='$reservation->fecha_salida' and st.id='$empleado->id')")
            ->get();
            $room = $room->first();
            $empleado->room()->wherePivot('fecha_staff', $reservation->fecha_salida)->detach($room->id);
        }
        $reservation->delete();
        return redirect()->back()->with('success', 'Reserva eliminada correctamente.');
    }
    /**Leonardo Costa
     * Función para desasignar una habitación de una reserva.
     */
    public function quitarRoom(Request $request, Reservation $reservation){
        $validatedData = $request->validate([
            'room_id' => 'exists:rooms,id'
        ]);
        $reservation->room()->detach($request->input('room_id'));
        $message = 'Habitación eliminada correctamente.';

        return redirect()->route('reservation.show', $reservation)->with('success', $message);
    }
    /**Leonardo Costa
     * Función para asignar un cliente a una reserva.
     */
    public function asignarCliente(Request $request, Reservation $reservation){
        $validatedData = $request->validate([
            'client_id' => 'nullable|exists:clients,dni'
        ]);

        $reservation->update([
            'personas' => $request->input('personas'),
            'fecha_ingreso' => $request->input('fecha_ingreso'),
            'fecha_salida' => $request->input('fecha_salida'),
            'tipo_habitacion' => $request->input('tipo_habitacion'),
            'user_id' => $request->input('user_id'),
            'client_id' => $request->input('client_id')
        ]);
        
        $client = Clients::all()->where('dni', $reservation->client_id)->first();
        return redirect()->route('clients.show', $client)->with('success', 'Reserva asignada correctamente');
    }
}
