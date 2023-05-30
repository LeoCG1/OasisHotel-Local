<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Clients;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Reservation $reservation)
    {

        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'concepto' => 'required|string|max:255',
            'direccion' => 'required|string|max:255|',
            'num_tarjeta' => 'required|numeric|max:9999999999999999999',
            'total' => 'required|numeric|max:9999999',
            'reservation_id' => 'required|exists:reservations,id'
        ]);

        $payment = Payment::create([
            'concepto' => $request->input('concepto'),
            'direccion' => $request->input('direccion'),
            'num_tarjeta' => $request->input('num_tarjeta'),
            'total' => $request->input('total'),
            'reservation_id' => $request->input('reservation_id')
        ]);
        $client = Clients::all()->where('dni', $request->input('client_id'))->first();
        return redirect()->route('clients.show', $client)->with('success', 'Pago realizado correctamente.');

    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        //$client = Clients::all()->where('dni', $payment->client_id)->first();
        $reservation = Reservation::all()->where('id', $payment->reservation_id)->first();
        $client = Clients::all()->where('dni', $reservation->client_id)->first();
        return view('/paginas/factura/factura')->with(compact('payment'))->with(compact('client'))->with(compact('reservation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $validatedData = $request->validate([
            'concepto' => 'required|string|max:255',
            'direccion' => 'required|string|max:255|',
            'num_tarjeta' => 'required|integer|max:9999999999999999999',
            'total' => 'required|numeric|max:9999999',
            'reservation_id' => 'required|exists:reservations,id'
        ]);

        $payment->update([
            'concepto' => $request->input('concepto'),
            'direccion' => $request->input('direccion'),
            'num_tarjeta' => $request->input('num_tarjeta'),
            'total' => $request->input('total'),
            'reservation_id' => $request->input('reservation_id')
        ]);
        $client = Clients::all()->where('dni', $request->input('client_id'))->first();
        return redirect()->route('clients.show', $client)->with('success', 'Pago actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $reservation = Reservation::all()->where('id', $payment->reservation_id)->first();
        $client = Clients::all()->where('dni', $reservation->client_id)->first();
        $payment->delete();
        $payment = $client->payment;
        return redirect()->route('clients.show', $client)->with('success', 'Pago eliminado correctamente.');
    }
}
