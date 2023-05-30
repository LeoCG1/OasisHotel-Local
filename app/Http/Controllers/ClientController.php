<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Reservation;
use App\Models\Payment;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user()->id;
        $clients = Clients::all();
        $total_clients = Clients::all()->count();
        return view('/paginas/clients/index')->with(compact('clients', 'total_clients'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('/paginas/clients/form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'dni' => 'required|string|max:9',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'required|string',
            'telefono' => 'required|numeric',
            'email' => 'required|string|email|max:255|unique:clients',
            'tipo_cliente' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $client = Clients::create([
            'dni' => $request->input('dni'),
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'tipo_cliente' => $request->input('tipo_cliente'),
            'user_id' => $request->input('user_id')
        ]);
        $reservation = Reservation::all()->where('client_id', $client->dni);
        $payment = $client->payment;
        return redirect()->route('clients.show', $client->dni)->with('success', 'Cliente creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Clients $client)
    {   
        $reservation = Reservation::all()->where('client_id', $client->dni);
        $payment = $client->payment;       
        return view('/paginas/clients/show')->with(compact('client'))->with(compact('reservation'))->with(compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Clients $client)
    {
        return view('/paginas/clients/form', compact('client'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Clients $client)
    {
        $validatedData = $request->validate([
            'dni' => 'required|string|max:9',
            'nombre' => 'required|string|max:255',
            'apellidos' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|min:9|max:15',
            'email' => 'required|string|email|max:255',
            'tipo_cliente' => 'required',
            'user_id' => 'required|exists:users,id'
        ]);

        $client->update([
            'dni' => $request->input('dni'),
            'nombre' => $request->input('nombre'),
            'apellidos' => $request->input('apellidos'),
            'direccion' => $request->input('direccion'),
            'telefono' => $request->input('telefono'),
            'email' => $request->input('email'),
            'tipo_cliente' => $request->input('tipo_cliente'),
            'user_id' => $request->input('user_id')
        ]);
        $reservation = Reservation::all()->where('client_id', $client->dni);
        $payment = $client->payment;
        return redirect()->route('clients.show', $client->dni)->with('success', 'Cliente actualizado correctamente.')->with(compact('client'))->with(compact('reservation'))->with(compact('payment'));;

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Clients $client)
    {
        $client->delete();
        $user = auth()->user()->id;
        return redirect()->route('users.show', $user)->with('success', 'Cliente eliminado correctamente.');

    }
}
