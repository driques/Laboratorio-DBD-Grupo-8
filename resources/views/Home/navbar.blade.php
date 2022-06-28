
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="{{URL('images/DEBEDE.png')}}" width="50" height="50" class="d-inline-block align-left me-3" alt="">
      DEBEDE Music
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">

      <ul class="navbar-nav right">
        <li class="nav-item justify-content-end">
          <a class="nav-link" aria-current="page" href="#">Quienes somos</a>
        </li>
        <li class="nav-item justify-content-end">
          <a class="nav-link" href="#">Ayuda</a>
        </li>
        
        <body style="background-color:rgb(33, 37, 41);">
          @guest
          <div class="d-flex align-items-right">
            <a href="{{url('/home/login2')}}">
              <button type="button" class="btn btn-outline-secondary me-3">
                Iniciar sesión
              </button>
            </a>
            <a href="{{url('/home/register')}}">
              <button type="button" class="btn btn-primary pl-auto me-3 rounded-pill">
                Registrarse
              </button>
            </a>
          </div>
          @endguest
          @auth
      <label for="validationDefault02" class="form-label">{{auth()->user()->username}} </label>
      <!-- <a href="/profile" class="btn btn-outline-success" role="button">Perfil</a>-->
      <form style="display: inline" action="/logout" method="POST">
        <a href="#" class="btn btn-outline-success" onclick="this.closest('form').submit()">Cerrar Sesión</a>
      </form>
      @endauth
      </ul>
    </div>
  </div>

</nav>