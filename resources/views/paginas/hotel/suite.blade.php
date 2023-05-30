@extends('layouts.app')
@section('titulo', 'Suite')
@section('contenido')

<div id="carouselSuite" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselSuite" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselSuite" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselSuite" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#carouselSuite" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="/fotos/habitacion/bed-g3405a70a4_1280.jpg" class="d-block w-100 img-fluid" alt="foto habitacion con cama del hotel">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="/fotos/habitacion/bathroom-gd27929a9e_1280.jpg" class="d-block w-100 img-fluid" alt="foto del baño con lavaropa">
        </div>
        <div class="carousel-item">
            <img src="/fotos/habitacion/bathroom-gadd363121_1280.jpg" class="d-block w-100 img-fluid" alt="foto del baño de la habitación">
        </div>
        <div class="carousel-item">
            <img src="/fotos/habitacion/living-room-ged1d75cdc_1280.jpg" class="d-block w-100 img-fluid" alt="foto del salón de la habitación">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselSuite" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselSuite" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <p>Acogedora habitación doble equipada con cama de matrimonio 1,50m x 2,10m y baño privado.</p>
        </div>
    </div>
</div>


<div class="accordion scroll-content fadeTop" id="accordionSuite">
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                Equipamiento habitación
            </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionSuite">
            <div class="accordion-body">
                <ul>
                    <li>Cama matrimonial de 1,50m x 2,10m.</li>
                    <li>Selección de almohadas y opción de almohada extra.</li>
                    <li>Cortina de oscurecimiento.</li>
                    <li>Lámparas de lectura.</li>
                    <li>Escritorio con punto de alimentación y USB.</li>
                    <li>Caja fuerte con capacidad para ordenador portátil.</li>
                    <li>Controlador individual del aire acondicionado y calefacción.</li>
                    <li>Cuna bajo petición por 15€/estancia</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Equipamiento Baño
            </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionSuite">
            <div class="accordion-body">
                <ul>
                    <li>Cabina de ducha termostática independiente.</li>
                    <li>Amenities sostenibles.</li>
                    <li>Secador</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Servicios Tecnológicos
            </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionSuite">
            <div class="accordion-body">
                <ul>
                    <li>Portal Cliente.</li>
                    <li>Acceso con llave móvil.</li>
                    <li>Conexión WIFI Privada 1GB.</li>
                    <li>Conexión Internet por Cable de alta velocidad.</li>
                    <li>Televisor de hasta 55” con servicio Chromecast, que permite enviar contenido desde tu móvil, tableta o PC al televisor de la habitación y acceder a contenidos de myCANAL, Netflix, YouTube, OCS, Amazon Prime Video, entre otros.</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="accordion-item">
        <h2 class="accordion-header" id="headingFout">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                Otros Servicios
            </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionSuite">
            <div class="accordion-body">
                <ul>
                    <li>Servicio de lavandería.</li>
                    <li>Packs de ocio.</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container serviciosSuite">
    <div class="row text-center reservaMargenSuite scroll-content fadeRight">
        <div class="col-12">
            <a href="{{ route('reservation.create') }}" class="btn btn-warning reservaHabitacion" id="botonReserva">Reserva</a>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <h2>Servicios comunes Habitaciones</h2>
        </div>
    </div>
    <div class="row scroll-content fadeLeft">
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/cama.png" class="img-fluid" alt="icono de una cama">
            <h3>Camas large o extra-large</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/cortinas.png" class="img-fluid" alt="icono de una cortina">
            <h3>Cortinas de oscurecimiento</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/almohada.png" class="img-fluid" alt="icono de una almohada">
            <h3>Selección de almohadas</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/bano-publico.png" class="img-fluid" alt="icono de un baño">
            <h3>Baño individual y secador</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/lavanderia.png" class="img-fluid" alt="icono de una lavadora">
            <h3>Servicio de lavanderia</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/puerta-inteligente.png" class="img-fluid" alt="icono de una puerta inteligente">
            <h3>Apertura inteligente</h3>
        </div>
    </div>
    <div class="row scroll-content fadeRight">
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/ordenador-portatil.png" class="img-fluid" alt="icono de un ordenador portatil con señal wifi">
            <h3>Conexión WIFI y cable</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/chromecast.png" class="img-fluid" alt="icono de chromecast">
            <h3>Chromecast</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/aire-acondicionado.png" class="img-fluid" alt="icono de aire acondicionado">
            <h3>Calefacción y aire accondicionado</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/tv-ancha.png" class="img-fluid" alt="icono de una televisión">
            <h3>Televisor pantalla plana</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/vehiculo.png" class="img-fluid" alt="icono de un vehiculo con una señal de parking">
            <h3>Opción de parking</h3>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-2">
            <img src="/iconos/diseno-de-interfaz-de-usuario.png" class="img-fluid" alt="icono de herramientas de usuario">
            <h3>Portal huespedes</h3>
        </div>
    </div>
</div>

<div class="container">
    <div class="row text-center">
        <div class="col-12">
            <h2 class="encuentraHabitacionSuite">Encuentra tu habitación ideal</h2>
        </div>
    </div>
    <div class="row cartaHabitacionesSuite scroll-content fadeLeft">
        <div class="col-sm-12 col-md-6 col-lg-6 margenHab">
            <div class="card border-success">
                <div class="entrar">
                <a href="{{ route('gransuite') }}"><img src="/fotos/habitacion/bedroom-ga50455b85_1280.jpg" class="card-img-top imagenEntrar img-fluid" alt="foto habitación gran suite"></a>
                <div class="iconoEntrarHab">
                    <img src="/iconos/entrar.png" class="iconoEntrar img-fluid">
                </div>
                </div>
                <div class="card-body text-center">
                    <h5 class="card-title">Gran Suite</h5>
                    <div class="iconosHabitacionCardSuite">
                        <img src="/iconos/familia (1).png" class="img-fluid" alt="icono de una familia">
                        <img src="/iconos/cama.png" class="iconoCentro img-fluid" alt="icono de una cama doble">
                        <img src="/iconos/cama individual.png" class="img-fluid" alt="icono de una cama individual">
                    </div>
                    <a href="{{ route('gransuite') }}" class="btn btn-primary mx-auto d-block verMas">Ver Más</a>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="card border-success">
                <div class="entrar">
                <a href="{{ route('familiar') }}"><img src="/fotos/habitacion/bedroom-gef7538ff0_1280.jpg" class="card-img-top imagenEntrar img-fluid" alt="foto habitación familiar"></a>
                <div class="iconoEntrarHab">
                    <img src="/iconos/entrar.png" class="iconoEntrar img-fluid">
                </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-center">Familiar</h5>
                    <div class="iconosHabitacionCardSuite">
                        <img src="/iconos/familia.png" class="img-fluid" alt="icono de una familia numerosa">
                        <img src="/iconos/hotel-con-cama-grande.png" class="iconoCentro img-fluid" alt="icono de una cama grande">
                        <img src="/iconos/cama.png" class="img-fluid" alt="icono de una cama doble">
                    </div>
                    <a href="{{ route('familiar') }}" class="btn btn-primary mx-auto d-block verMas">Ver Más</a>
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