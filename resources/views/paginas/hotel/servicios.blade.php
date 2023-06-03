@extends('layouts.app')
@section('titulo', 'Servicios')
@section('contenido')

<div class="container">

    <div class="row text-center">
      <div class="col-12">
        <h1 class="tituloRestaurante">Restaurante</h1>
      </div>
    </div>
    <div class="row restauranteRow">
      <div class="col-sm-12 col-md-6 col-lg-3 restauranteStyle">
        <h2>UN RESTAURANTE CON HISTORIA</h2>
        <p>Los mejores platos Valencianos se pueden encontrar aquí mismo.</p>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
        <img src="/fotos/restaurante/restaurant-g4e345cc7e_1280.jpg" class="img-thumbnail izquierda img-fluid" alt="foto del interior del restaurante">
        <h2>Restaurante para eventos</h2>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
        <img src="/fotos/restaurante/alcoholic-beverages-g9d345f149_1280.jpg" class="img-thumbnail centro img-fluid" alt="foto del interior del bar">
        <h2>Bar</h2>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-3">
        <img src="/fotos/restaurante/pool-bar-gc9d482b21_1280.jpg" class="img-thumbnail derecha img-fluid" alt="foto del bar piscina">
        <h2>Bar Piscina</h2>
      </div>
    </div>
  </div>
  <div class="container servicesIcons">
    <div class="row text-center">
      <div class="col-12">
        <h1>Servicios</h1>
      </div>
    </div>
    <div class="row scroll-content fadeLeft">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/fotos/piscina/inner-space-g4cb861185_1280.jpg" class="img-thumbnail izquierda img-fluid" alt="foto piscina interior">
        <h2>Piscina Interior</h2>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/fotos/piscina/summer-g5fa9f088b_1280.jpg" class="img-thumbnail centro img-fluid" alt="foto piscina exterior">
        <h2>Piscina Exterior</h2>
      </div>
      <div class="col-sm-12 col-md-12 col-lg-4">
        <img src="/fotos/gimnasio/gym-ga18959f58_1280.jpg" class="img-thumbnail derecha img-fluid" alt="foto del gimnasio">
        <h2>Gimnasio</h2>
      </div>
    </div>
  </div>
  <div class="container serviceMargin">
    <div class="row text-center">
      <div class="col-12">
        <h1 class="otrosServiceTitulo">Otros</h1>
      </div>
    </div>
    <div class="row otrosServiceIcons scroll-content fadeRight">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/vehiculo.png" class="img-fluid" alt="icono con un coche con un letrero de parking, representando estacionamiento">
        <h2>Parking</h2>
        <ul>
          <li>Parking privado por 18€ por plaza y noche</li>
          <li>Estacionamiento bajo techo</li>
          <li>Plaza accesible</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/telefono-inteligente.png" class="img-fluid" alt="icono de un telefono móvil">
        <h2>Check in-out Online</h2>
        <ul>
          <li>Llave móvil o tarjeta</li>
          <li>Atención las 24h</li>
          <li>Recepción de 10 a 22h</li>
          <li>Check-In a partir de 15:00, Check-Out antes de las 12:00 horas</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/servicio-al-cliente.png" class="img-fluid" alt="icono de una persona con cascos y micro, representando atención las 24 horas">
        <h2>Portal Oasis</h2>
        <ul>
          <li>Asesoría turística para tu viaje</li>
          <li>Servicios de personalización de la estancia.</li>
          <li>Teléfono o whatsapp de atención 24 horas.</li>
          <li>Todo lo que necesitas saber sobre nuestras instalaciones: desde cómo acceder al chromecast hasta cómo
            programar la caja de seguridad.</li>
        </ul>
      </div>
    </div>
    <div class="row otrosServiceIcons scroll-content fadeTop">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/lavanderia.png" class="img-fluid" alt="icono de una lavadora, representando lavandería">
        <h2>Lavandería</h2>
        <ul>
          <li>Servicio de lavandería para huespedes.</li>
          <li>Lavado de toallas y sábanas a elección del huésped, como medida de protección del medio ambiente.</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/taza-de-cafe.png" class="img-fluid" alt="icono de una taza de café, representando un servicio de cafeteria">
        <h2>Cafeteria</h2>
        <ul>
          <li>Cafetería abierta de 08:00 a 24:00h.</li>
          <li>Desayuno personalizado de 8:00 a 10:00 h.</li>
          <li>Carta internacional con productos locales.</li>
          <li>Menú para deportistas</li>
          <li>Menú para niños</li>
          <li>Cervecería y vinoteca</li>
          <li>Servício take-away</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/cine.png" class="img-fluid" alt="icono de palomitas, representando actividades varias">
        <h2>Actividades</h2>
        <ul>
          <li>Asesoría personal de viaje en la recepción y a través del portal cliente</li>
          <li>Pases para gimnasio y/o piscinas del hotel </li>
          <li>Packs de ocio según temporada</li>
          <li>Tickets para actividades turísticas</li>
        </ul>
      </div>
    </div>
    <div class="row otrosServiceIcons scroll-content fadeLeft">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/ordenador-portatil.png" class="img-fluid" alt="icono de ordenador portatil con señal wifi">
        <h2>WIFI y Cable</h2>
        <ul>
          <li>WIFI personal 1 GB</li>
          <li>Posibilidad de conexión por cable.</li>
          <li>Conexión USB en los escritorios o junto a ellos.</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/chromecast.png" class="img-fluid" alt="icono de chromecast">
        <h2>ChromeCast</h2>
        <ul>
          <li>Televisores de pantalla plana.</li>
          <li>Conexión televisor-móvil mediante Chromecast, que permite enviar contenido desde tu móvil, tableta o PC al
            televisor de la habitación y acceder a contenidos de myCANAL, Netflix, YouTube, OCS, Amazon Prime Video,
            entre otros.</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/maleta.png" class="img-fluid" alt="icono con una maleta">
        <h2>Maletero</h2>
        <ul>
          <li>Posibilidad de dejar tus maletas a la llegada o salida del hotel.</li>
          <li>Maletero cerrado bajo llave.</li>
        </ul>
      </div>
    </div>
    <div class="row otrosServiceIcons scroll-content fadeRight">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/cama.png" class="img-fluid" alt="icono con una cama">
        <h2>Camas de gran formato</h2>
        <ul>
          <li>Cama standart de 2,10m de largo.</li>
          <li>Cama extra-large de 2,50m de largo.</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/minusvalido.png" class="img-fluid" alt="icono de una persona minusválida, representando accesibilidad">
        <h2>Accesibilidad</h2>
        <ul>
          <li>Instalaciones accesibles (ascensor, rampas de acceso, señalización para personas con discapacidad visual).
          </li>
          <li>Habitación accesible.</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/seleccion.png" class="img-fluid" alt="icono con personas seleccionadas o no">
        <h2>Política de ocupación</h2>
        <ul>
          <li>Cuna por 15€/estancia.</li>
          <li>Política de cancelación informada en el momento de la reserva.</li>
          <li>Tarjetas admitidas: Visa, Amex, Mastercard.</li>
        </ul>
      </div>
    </div>
    <div class="row otrosServiceIcons scroll-content fadeTop">
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/virus.png" class="img-fluid" alt="icono con un virus, representando Covid">
        <h2>Protocolo COVID</h2>
        <ul>
          <li>Digitalización eficiente contactless.</li>
          <li>Consulta nuestro protocolo COVID.</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/check-out.png" class="img-fluid" alt="icono de una persona saliendo del hotel">
        <h2>Late check-out</h2>
        <ul>
          <li>Entra antes de las 15:00 h. gracias a la tarifa early check-in.</li>
          <li>Deja tu habitación más tarde de las 12:00 h. gracias a la tarifa late check-out.</li>
        </ul>
      </div>
      <div class="col-sm-12 col-md-6 col-lg-4">
        <img src="/iconos/check-in.png" class="img-fluid" alt="icono de una persona entrando al hotel">
        <h2>Late check-in</h2>
        <ul>
          <li>Entra después de las 20:00 h gracias a la tarifa late check-in</li>
        </ul>
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