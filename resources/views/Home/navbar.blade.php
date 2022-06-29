<style>
  #resultados {
    background-color: black;
    color: aliceblue;
    position: absolute;
    z-index: 4;
  }

  .bg-custom-1 {
    background-color: #85144b;
  }

  .bg-custom-2 {
    background-image: linear-gradient(15deg, #13547a 0%, #80d0c7 100%);
  }
</style>

<head>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">

    @guest
    <a class="navbar-brand" href="/">
      <img src="{{URL('images/DEBEDE.png')}}" width="50" height="50" class="d-inline-block align-left me-3" alt="">
      DEBEDE Music
    </a>
    @endguest
    @auth
    <a class="navbar-brand" href="/">
      <img src="{{URL('images/DEBEDE.png')}}" width="50" height="50" class="d-inline-block align-left me-3" alt="">
    </a>
    <button class="navbar-toggler" type="button">
      <span class="navbar-toggler-icon"></span>
    </button>

    <ul class="navbar-nav">
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
          - {{auth()->user()->name}}
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="/song/player">Player</a>
          <a class="dropdown-item" href="/profile">Editar mi usuario</a>

        </div>
      </li>
    </ul>


    @endauth

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">

      @auth

      <div class="col-8">
        <div class="input-group">
          <input type="text" class="form-control" id="texto" placeholder="Buscar canción o usuario">
        </div>
        <div id="resultados" class="bg-ligh">

        </div>
      </div>
      <script>
        window.addEventListener('load', function() {
          document.getElementById("texto").addEventListener("keyup", () => {
            if ((document.getElementById("texto").value.length) >= 1)
              fetch(`/song/searchNavbar?texto=${document.getElementById("texto").value}`, {
                method: 'get'
              })
              .then(response => response.text())
              .then(html => {
                document.getElementById("resultados").innerHTML = html
              })
            else
              document.getElementById("resultados").innerHTML = ""
          })
        });
      </script>
      <script>
        function redirect(namesong, urlsong) {
          window.location.href = "/song/player?namesong=" + namesong + "&urlsong=" + urlsong;
        }
      </script>

      @endauth
      <ul class="navbar-nav right">

        <li class="nav-item justify-content-end">
          <a class="nav-link" aria-current="page" href="#">¿Quiénes somos?</a>
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