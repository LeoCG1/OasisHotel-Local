@extends('layouts.app')
@section('titulo', 'Home')
@section('contenido')

<div id="carouselIndexPrincipal" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide-to="4" aria-label="Slide 5"></button>
      <button type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide-to="5" aria-label="Slide 6"></button>
      <button type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide-to="6" aria-label="Slide 7"></button>
      <button type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide-to="7" aria-label="Slide 8"></button>
      <button type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide-to="8" aria-label="Slide 9"></button>
    </div>
    <div class="carousel-inner principalInner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="./fotos/carruselPrincipal/city-ge3b0c0993_1280.jpg" class="img-fluid d-block w-100" alt="foto del hotel">
        <div class="carousel-caption d-none d-md-block">
          <h5>Un hotel único</h5>
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="/fotos/carruselPrincipal/people-g63444821d_1280.jpg" class="img-fluid d-block w-100"
          alt="foto de mujer en un sofa del hotel">
        <div class="carousel-caption d-none d-md-block">
          <h5>Con el mayor confort y tranquilidad</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/carruselPrincipal/bed-gf64066e65_1280.jpg" class="img-fluid d-block w-100" alt="foto de una cama">
        <div class="carousel-caption d-none d-md-block">
          <h5>54 Habitaciones, millones de histórias</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/carruselPrincipal/design-g057e8e0b0_1280.jpg" class="img-fluid d-block w-100"
          alt="foto de un salon con diseño contemporáneo">
        <div class="carousel-caption d-none d-md-block">
          <h5>Diseño contemporáneo</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/carruselPrincipal/hotel-ga9f79d0e0_1280.jpg" class="img-fluid d-block w-100"
          alt="foto de un restaurante interior">
        <div class="carousel-caption d-none d-md-block">
          <h5>Disfrute de la gastronomía Valenciana</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/carruselPrincipal/hotel-gcceb33c86_1280.jpg" class="img-fluid d-block w-100"
          alt="foto de una habitación con cama">
        <div class="carousel-caption d-none d-md-block">
          <h5>Para el mejor descanso</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/carruselPrincipal/hotel-geb887488a_1280.jpg" class="img-fluid d-block w-100"
          alt="foto del hotel en invierno">
        <div class="carousel-caption d-none d-md-block">
          <h5>En todas las estaciones</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/carruselPrincipal/martini-glass-g654e7caef_1280.jpg" class="img-fluid d-block w-100"
          alt="foto de copas">
        <div class="carousel-caption d-none d-md-block">
          <h5>El mejor servicio de bebidas</h5>
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/carruselPrincipal/valencia-ge9e9cab49_1280.jpg" class="img-fluid d-block w-100" alt="foto del puerto">
        <div class="carousel-caption d-none d-md-block">
          <h5>Cercania al puerto</h5>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselIndexPrincipal" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <div class="container text-center">
    <div class="row">
      <div class="col-12">
        <h1 id="galeria">Galeria</h1>
      </div>
    </div>
    <div class="row galeria scroll-content fadeTop">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <h2>Hotel</h2>
        <div class="fotoAlModal">
        <a data-bs-toggle="modal" data-bs-target="#modalHotel" class="modalClick"><img class="img-fluid img-thumbnail imagenModal"
            src="/fotos/hotel/hotel-gd1b75c2d8_1280.jpg"></a>
            <div class="iconoImagenes">
              <img src="/iconos/gallery.png" class="iconoModal">
            </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <h2>Habitaciones</h2>
        <div class="fotoAlModal">
        <a data-bs-toggle="modal" data-bs-target="#modalHabitacion"><img class="img-fluid img-thumbnail imagenModal"
            src="/fotos/habitacion/bedroom-ga50455b85_1280.jpg"></a>
            <div class="iconoImagenes">
              <img src="/iconos/gallery.png" class="iconoModal">
            </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <h2>Restaurante</h2>
        <div class="fotoAlModal">
        <a data-bs-toggle="modal" data-bs-target="#modalRestaurante"><img class="img-fluid img-thumbnail imagenModal"
            src="/fotos/restaurante/restaurant-g4e345cc7e_1280.jpg"></a>
            <div class="iconoImagenes">
              <img src="/iconos/gallery.png" class="iconoModal">
            </div>
        </div>
      </div>
    </div>
    <div class="row galeria scroll-content fadeRight">
      <div class="col-sm-12 col-md-6">
        <h2>Gimnasio</h2>
        <div class="fotoAlModal">
        <a data-bs-toggle="modal" data-bs-target="#modalGimnasio"><img class="img-fluid img-thumbnail imagenModal"
          src="/fotos/gimnasio/gym-g66c138f49_1280.jpg"></a>
          <div class="iconoImagenes">
              <img src="/iconos/gallery.png" class="iconoModal">
            </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <h2>Piscina</h2>
        <div class="fotoAlModal">
        <a data-bs-toggle="modal" data-bs-target="#modalPiscina"><img class="img-fluid img-thumbnail imagenModal"
          src="/fotos/piscina/inner-space-g4cb861185_1280.jpg"></a>
          <div class="iconoImagenes">
              <img src="/iconos/gallery.png" class="iconoModal">
            </div>
        </div>
      </div>
    </div>
  </div>
  <div class="container beneficiosRow">
    <div class="row beneficios scroll-content fadeLeft">
      <div class="col-sm-6 col-md-4 col-lg-2 beneficiosStyle">
        <h2 class="beneficiosTitulo">Beneficios</br>exclusivos</br>al</br>reservar</br>en</br>nuestra</br>web</h2>
        <a class="btn btn-warning" id="botonReserva">Reserva Ahora</a>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-3 beneficiosMargen cancelar margenImg">
        <img src="/iconos/cancelar.png" class="img-fluid">
        <h3>Cancelación</br> gratuita hasta 48h</br> antes de la llegada</h3>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-3 beneficiosMargen margenImg">
        <img src="/iconos/apreton-de-manos.png" class="img-fluid">
        <h3>Compromiso de</br> mejor tarifa </br>disponible</h3>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-2 beneficiosMargen margenImg margenMedia">
        <img src="/iconos/cuidado-de-la-salud2.png" class="img-fluid">
        <h3>Welcome pack y</br> atenciones de</br> bienvenida</h3>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-2 beneficiosMargen margenImg margenMedia">
        <img src="/iconos/servicio-al-cliente.png" class="img-fluid">
        <h3>Asistente</br>personal 24</br>horas</h3>
      </div>
    </div>
  </div>
  <div class="container covidRow">
    <div class="row covid d-flex justify-content-around scroll-content fadeTop">
      <div class="col-sm-12 col-md-4 col-lg-3 viajar">
        <p class="covidP text-center">Covid-19: nuestras mejoras en protocolos y servicios</p>
        <h2 class="covidTranq">Viaje con total tranquilidad
          </h2>
          <a class="btn btn-warning" id="botonReserva" href="#">Más información</a>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-3 viajarMargen margenImg">
        <img src="/iconos/corazon.png" class="img-fluid" alt="imagen corazon">
        <h3 class="text-center">Certificación anti Covid-19</h3>
        <p class="text-center">Hemos obtenido los sellos WTTC Safe Tourism y Tourism Covid-19 Protocol On</p>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-3 viajarMargen">
        <img src="/iconos/cuidado-de-la-salud.png" class="img-fluid" alt="imagen de una mano con una cruz, representa salud">
        <h3 class="text-center">Actualización de procedimientos</h3>
        <p class="text-center">Disfrute de una estancia segura con procedimientos reforzados y más personalizados</p>
      </div>
      <div class="col-sm-12 col-md-4 col-lg-3 viajarMargen">
        <img src="/iconos/escudo-seguro.png" class="img-fluid" alt="imagen de un escudo, representando seguridad">
        <h3 class="text-center">Espacios más seguros</h3>
        <p class="text-center">Climatización avanzada que renueva constantemente el aire en circulación</p>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-12 text-center">
        <h1 id="habitaciones">Habitaciones</h1>
      </div>
    </div>
    <div class="row habitacionRow scroll-content fadeLeft">
      <div class="col-sm-12 col-md-6 col-lg-4">
      <h2>Gran Suite</h2>
      <div class="fotoAlModal">
        <a href="{{ route('gransuite') }}"><img src="/fotos/habitacion/bedroom-ga50455b85_1280.jpg" alt="foto habitación gran suite" class="imagenModal img-fluid"></a>
        <div class="iconoImagenes">
              <img src="/iconos/entrar.png" class="img-fluid iconoModal">
            </div>
      </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
      <h2>Suite</h2>
      <div class="fotoAlModal">
        <a href="{{ route('suite') }}"><img src="/fotos/habitacion/bedroom-gef7538ff0_1280.jpg" class="imagenModal img-fluid" alt="foto habitacion familiar"></a>
        <div class="iconoImagenes">
              <img src="/iconos/entrar.png" class="iconoModal">
            </div>
      </div>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
      <h2>Familiar</h2>
      <div class="fotoAlModal">
        <a href="{{ route('familiar') }}"><img class="imagenModal img-fluid" src="/fotos/habitacion/bed-g3405a70a4_1280.jpg" alt="foto habitacion suite"></a>
        <div class="iconoImagenes">
              <img src="/iconos/entrar.png" class="iconoModal">
            </div>
      </div>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row text-center">
      <div class="col-12">
        <h1 id="ubicacion">Ubicación</h1>
      </div>
    </div>
    <div class="row ubicacionRow scroll-content fadeRight">
      <div class="col-sm-12 col-md-3 hotelDescripcion">
       <div> <p>Hotel Oasis se halla en el barrio de La Punta, pegado a la Ciudad de las Ciencias de Valencia.</br>
          El aeropuerto de Valencia (VLC) se encuentra a 13' en coche.</br>
          Hay paradas del autobus cercanas que van a todas las direcciones.</br>
          La paradas de metro mas cercana son Cólon, Alameda o Marítim, pero tenemos el tranvía en nuestra puerta.</br>
          La estación de tren Ave, se encuentra a poco más de 5km (15' en coche).</br>
          Y si vienes en coche, tenemos servicio de aparcamiento privado.</br>
        </p>
        <a class="btn btn-warning" id="botonReserva" href="https://www.google.es/maps/dir//39.4521777,-0.3539732/@39.4519705,-0.3550466,17.08z/data=!4m2!4m1!3e3?entry=ttu" target="_blank">Cómo llegar</a>
       </div>
      </div>
      <div class="col-sm-12 col-md-9 mapaHotel">
        <iframe src="https://www.google.com/maps/embed/v1/place?q=39.45273528126275,+-0.3527855491436823&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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




  
<div class="modal fade modal-dialog modal-fullscreen" id="modalHotel" tabindex="-1" aria-labelledby="modalHotelLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-fullscreen-sm-down modal-fullscreen-lg-down modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="carouselHotel" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHotel" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselHotel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselHotel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselHotel" data-bs-slide-to="3" aria-label="Slide 4"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="/fotos/hotel/hotel-gd1b75c2d8_1280.jpg" class="d-block w-100" alt="foto fachada hotel">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="/fotos/hotel/strasbourg-gdd2a8a41f_1280.jpg" class="img-fluid d-block w-100"
                alt="foto pasillo del hotel">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/hotel/hotel-room-g480d90940_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de una habitacion del hotel con vistas">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/hotel/inside-gadafa1da1_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de un salon con diseño contemporáneo">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselHotel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselHotel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade modal-dialog modal-fullscreen" id="modalHabitacion" tabindex="-1" aria-labelledby="modalHabitacionLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-fullscreen-sm-down modal-fullscreen-lg-down modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="carouselHabitacion" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="1"
              aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="2"
              aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="3"
              aria-label="Slide 4"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="4"
              aria-label="Slide 5"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="5"
              aria-label="Slide 6"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="6"
              aria-label="Slide 7"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="7"
              aria-label="Slide 8"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="8"
              aria-label="Slide 9"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="9"
              aria-label="Slide 10"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="10"
              aria-label="Slide 11"></button>
            <button type="button" data-bs-target="#carouselHabitacion" data-bs-slide-to="11"
              aria-label="Slide 12"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="/fotos/habitacion/modern-minimalist-lounge-g602205d4b_1280.jpg" class="img-fluid d-block w-100"
                alt="foto habitacion minimalista">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="/fotos/habitacion/bath-g0c2387793_1280.jpg" class="img-fluid d-block w-100" alt="foto baño">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/bedroom-ga50455b85_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de una habitacion del hotel con vistas">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/living-room-g73a56e866_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de un salon del hotel">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/bathroom-g88b5c2e53_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de baño de una habitacion del hotel">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/living-room-ged1d75cdc_1280.jpg" class="img-fluid d-block w-100"
                alt="foto del salon de una habitacion">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/bathroom-gadd363121_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de una habitacion del hotel con vistas">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/living-room-gc9e419b38_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de un salon de una habitacion">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/bed-g3405a70a4_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de una cama de una habitacion">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/living-room-g73a56e866_1280.jpg" class="img-fluid d-block w-100"
                alt="foto del salon de una habitacion">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/bathroom-gd27929a9e_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de un baño del hotel con vistas">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/habitacion/bedroom-gef7538ff0_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de una habitacion con cama">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselHabitacion" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselHabitacion" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade modal-dialog modal-fullscreen" id="modalRestaurante" tabindex="-1" aria-labelledby="modalRestauranteLabel" aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-fullscreen-sm-down modal-fullscreen-lg-down modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="carouselRestaurante" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselRestaurante" data-bs-slide-to="0" class="active"
        aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselRestaurante" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselRestaurante" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselRestaurante" data-bs-slide-to="3" aria-label="Slide 4"></button>
      <button type="button" data-bs-target="#carouselRestaurante" data-bs-slide-to="4" aria-label="Slide 5"></button>
      <button type="button" data-bs-target="#carouselRestaurante" data-bs-slide-to="5" aria-label="Slide 6"></button>
      <button type="button" data-bs-target="#carouselRestaurante" data-bs-slide-to="6" aria-label="Slide 7"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active" data-bs-interval="10000">
        <img src="/fotos/restaurante/dinner-ge9fe5e5e9_1280.jpg" class="img-fluid d-block w-100" alt="foto de una mesa con comida">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item" data-bs-interval="2000">
        <img src="/fotos/restaurante/paella-g1d2573377_1280.jpg" class="img-fluid d-block w-100"
          alt="foto de una paella">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/restaurante/pizza-g0ab35887c_1280.jpg" class="img-fluid d-block w-100" alt="foto de una pizza">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/restaurante/platter-g602bade1a_1280.jpg" class="img-fluid d-block w-100"
          alt="foto de un plato con comida">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/restaurante/restaurant-g4e345cc7e_1280.jpg" class="img-fluid d-block w-100"
          alt="foto del restaurante">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/restaurante/salad-gce195e222_1280.jpg" class="img-fluid d-block w-100" alt="foto de una ensalada">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
      <div class="carousel-item">
        <img src="/fotos/restaurante/alcoholic-beverages-g9d345f149_1280.jpg" class="img-fluid d-block w-100"
          alt="foto de bebidas alcoholicas">
        <div class="carousel-caption d-none d-md-block">
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselRestaurante" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselRestaurante" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
      </div>

    </div>
  </div>
</div>



<div class="modal fade modal-dialog modal-fullscreen" id="modalGimnasio" tabindex="-1" aria-labelledby="modalGimnasioLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-fullscreen-sm-down modal-fullscreen-lg-down modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="carouselGimnasio" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselGimnasio" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselGimnasio" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselGimnasio" data-bs-slide-to="2" aria-label="Slide 3"></button>
            <button type="button" data-bs-target="#carouselGimnasio" data-bs-slide-to="3" aria-label="Slide 4"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="/fotos/gimnasio/gym-g66c138f49_1280.jpg" class="d-block w-100" alt="foto del gimnasio con maquinas para correr">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="/fotos/gimnasio/fitness-g836d4b41e_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de pesas">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/gimnasio/fitness-room-g6649d60e4_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de maquinas de pesas">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/gimnasio/gym-ga18959f58_1280.jpg" class="img-fluid d-block w-100"
                alt="foto maquinas del gimnasio">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselGimnasio" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselGimnasio" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>


<div class="modal fade modal-dialog modal-fullscreen" id="modalPiscina" tabindex="-1" aria-labelledby="modalPiscinaLabel"
  aria-hidden="true">
  <div class="modal-dialog modal-fullscreen modal-fullscreen-sm-down modal-fullscreen-lg-down modal-fullscreen-xl-down">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div id="carouselPiscina" class="carousel slide" data-bs-ride="carousel">
          <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselPiscina" data-bs-slide-to="0" class="active"
              aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselPiscina" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselPiscina" data-bs-slide-to="2" aria-label="Slide 3"></button>
          </div>
          <div class="carousel-inner">
            <div class="carousel-item active" data-bs-interval="10000">
              <img src="/fotos/piscina/inner-space-g4cb861185_1280.jpg" class="img-fluid d-block w-100" alt="foto piscina interior">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item" data-bs-interval="2000">
              <img src="/fotos/piscina/summer-g5fa9f088b_1280.jpg" class="img-fluid d-block w-100"
                alt="foto piscina exterior">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="/fotos/piscina/woman-g6454e2eea_1280.jpg" class="img-fluid d-block w-100"
                alt="foto de una mujer en la piscina">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselPiscina" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselPiscina" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection

