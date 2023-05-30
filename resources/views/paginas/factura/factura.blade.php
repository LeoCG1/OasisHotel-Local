<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Oasis - Factura</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<style>
    
.factura h1{
    font-size: 25px;
}

.factura h2{
    font-size: 17px;
}
.factura .espacio{
    margin-bottom: 40px;
}
.factura h3{
    font-size: 14px;
}
.factura p{
    margin-bottom: 0px;
    
}
.factura .gracias{
    position: relative;
    bottom: 100px;
}
.factura .numFactura{
    position: relative;
    bottom: 80px;
    left: 400px;
}
.factura table{
    margin-top: 20px;
    margin-bottom: 60px;
}
</style>
<body class="factura">
<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h1>Factura</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <h1 class="text-warning" style="color:green;">Oasis Hotel</h1>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <h2>Avenida Inventada 1000</h2>
        </div>
    </div>
    <div class="row text-center espacio">
        <div class="col-12">
            <h2>46011 Valéncia, España</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-4">
            <h3>Facturar a..</h3>
            <p>{{ $client->nombre }} {{ $client->apellidos }}</p>
            <p>{{ $client->direccion }} </p>
            <p>{{ $client->telefono }} </p>
        </div>
        <div class="col-3 numFactura">
            <h3>Número de Factura</h3><p>{{ $payment->id }}</p>
            <h3>Fecha</h3><p>{{ $payment->created_at}}</p>
        </div>

    </div>
    <div class="row">
        <table class="table table-borderless">
            <thead>
                <tr class="table-warning">
                    <th>Descripción</th>
                    <th>Precio Unitario</th>
                    <th>Importe</th>
                </tr>
            </thead>
            <tbody>

                    @foreach($reservation->room as $habitacion)
                          <tr>
                            <td>{{ $habitacion->descripcion }}</td>
                            <td>{{ $habitacion->precio }}</td>
                            <td>{{ $habitacion->precio }}</td>
                          </tr>  
                    @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th></th>
                    <th class="text-warning border border-warning">Subtotal</th>
                    <td class="border border-warning">{{ $payment->total/1.21 }}</td>
                </tr>
                <tr>
                    <th></th>
                    <th class="text-warning border border-warning">IVA</th>
                    <td class="border border-warning">21%</td>
                </tr>
                <tr>
                    <th></th>
                    <th class="text-danger border border-warning">TOTAL</th>
                    <th class="text-danger border border-warning">{{ $payment->total }}</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <div class="row">
        <div class="col-6 border-end border-dark">
            <h3>Condiciones y forma de pago</h3>
            <p class="mb-3">El plago se realizará en un plazo de 15 días</p>

            <p>Banco BBVA</p>
            <p>IBA: ES12 1234 1234</p>
            <p>SWIFT: ABCDEFG10001Z</p>
        </div>
        <div class="col-6 text-end gracias">
            <h1>Gracias</h1>
        </div>
    </div>
</div>

</body>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</html>