<nav class="navbar navbar-expand-lg navbar-dark sticky-top sinScrollNav" id="posicionNatural">
  <div class="container-fluid">
    <div class="iconoReserva sinScroll" id="posicionSinScroll">
    <a class="navbar-brand" href="/"> <img src="/fotos/Oasis.png" class="img-fluid" alt="icono hotel"></a>
    @guest
    <a type="button" data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-warning tamano" id="botonReserva">Reservar</a>
    @endguest
    @auth
    <a href="{{ route('reservation.create') }}" class="btn btn-warning tamano" id="botonReserva">Reservar</a>
    @endauth
    </div>
    
    <button class="navbar-toggler ms-auto" style="background-color:#6abfa5;" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse ms-auto" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto" id="linksdesplazar">
        <li class="nav-item">
          <a class="nav-link subrallado estiloTexto" style="color:#6abfa5; font-size:1.5vw;" aria-current="page" href="/#habitaciones">Habitaciones</a>
        </li>
        <li class="nav-item">
          <a class="nav-link subrallado estiloTexto" style="color:#6abfa5; font-size:1.5vw;"  href="{{ route('servicios') }}">Servicios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link subrallado estiloTexto" style="color:#6abfa5; font-size:1.5vw;"  href="/#galeria">Galeria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link subrallado estiloTexto" style="color:#6abfa5; font-size:1.5vw;"  style="color:#6abfa5;"  href="/#ubicacion">Ubicación</a>
        </li>
        <li class="nav-item">
          <a class="nav-link subrallado estiloTexto" style="color:#6abfa5; font-size:1.5vw;"  href="{{ route('comments.index') }}">Opiniones</a>
        </li>
      </ul>
      <ul class="navbar-nav ms-auto informacion">
        <li class="nav-item">
          <div style="font-weight: bolder; font-size:1vw;"><span><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511z" />
              </svg> +34 96 123 123</span></br>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-mailbox" viewBox="0 0 16 16">
              <path d="M4 4a3 3 0 0 0-3 3v6h6V7a3 3 0 0 0-3-3zm0-1h8a4 4 0 0 1 4 4v6a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V7a4 4 0 0 1 4-4zm2.646 1A3.99 3.99 0 0 1 8 7v6h7V7a3 3 0 0 0-3-3H6.646z" />
              <path d="M11.793 8.5H9v-1h5a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.354-.146l-.853-.854zM5 7c0 .552-.448 0-1 0s-1 .552-1 0a1 1 0 0 1 2 0z" />
            </svg> <span> info@oasishotel.com</span>
          </div>
        </li>
      </ul>
    </div>
  </div>

</nav>
@if (session('error'))
            <div class="mensajesError mt-3">
                {{ session('error') }}
            </div>
        @endif
        @if(session('success'))
            <div class="mensajesSuccess mt-3">
                {{session('success')}}
            </div>
        @endif

<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="loginModalLabel">Formulario Login</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="cotainer">
              <div class="row justify-content-center">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <form method="POST" action="{{ route('plogin') }}">
                        @csrf
                        <div class="form-group mb-3">
                          <input type="text" placeholder="Email" id="email" class="form-control" name="email" required autofocus>
                          @if ($errors->has('email'))
                          <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('email') }}</div>
                          @endif
                        </div>
                        <div class="form-group mb-3">
                          <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                          @if ($errors->has('password'))
                          <div class="alert alert-danger mt-3" role="alert">{{ $errors->first('password') }}</div>
                          @endif
                        </div>
                        <div class="form-group mb-3">
                          <div class="checkbox">
                            <label>
                              <input type="checkbox" name="remember"> Recuerdame
                            </label>
                          </div>
                          @if (session('error'))
                          <div class="alert alert-danger mt-3">
                            {{ session('error') }}
                          </div>
                          @endif
                          @if(session('success'))
                          <div class="alert alert-success mt-3">
                            {{session('success')}}
                          </div>
                          @endif
                        </div>
                      <div class="row mb-3">
                      <div class="col-6">
                        <a class="btn btn-outline-dark" href="{{ route('login-google') }}" role="button" style="text-transform:none">
                          <img width="20px" style="margin-bottom:3px; margin-right:5px" alt="Google sign-in" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/53/Google_%22G%22_Logo.svg/512px-Google_%22G%22_Logo.svg.png" />
                          Login with Google
                        </a>
                      </div>
                    </div>
                        <div class="d-grid mx-auto">
                          <button type="submit" class="btn btn-primary btn-block">Enviar</button>
                        </div>
                        <div class="d-grid mx-auto mt-2">
                          <a href="{{ route('register') }}" class="btn btn-secondary btn-block">Registrarse</a>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>