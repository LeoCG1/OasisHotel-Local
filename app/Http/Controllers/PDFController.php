<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use PDF;
use App\Models\Reservation;
use App\Models\Clients;
class PDFController extends Controller
{
    /**Leonardo Costa
     * Función para descargar la factura en PDF.
     * Envía los datos del cliente, reserva y pago a una vista, y esa es descargada en PDF.
     */
    public function PDF(Payment $payment){
        $reservation = Reservation::all()->where('id', $payment->reservation_id)->first();
        $client = Clients::all()->where('dni', $reservation->client_id)->first();
        $pdf = PDF::loadView('/paginas/factura/factura', compact('payment', 'client', 'reservation'));
        return $pdf->download('Factura.pdf');
    }
    /**Leonardo Costa
     * Función para descargar el manual de usuario en PDF
     */
    public function manualUsuario(){
        $pdf = PDF::loadView('/paginas/staff/manualUsuario');
        return $pdf->download('Manual_Usuario.pdf');
    }
}
