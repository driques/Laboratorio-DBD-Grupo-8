<!DOCTYPE html>
<html lang="es" >
     <head>
     <style>
    #grid1 {
      /*width: 1200px;*/
      min-height: 1000px;
      height: auto;
      /*margin: 80px auto 0px auto;*/
      background-image: linear-gradient(to bottom,rgb(138, 199, 245), rgb(57, 88, 149), rgb(31, 33, 37));
      /*padding: 10px 10px; */
      overflow: auto
    }
    body {
      font-family: Verdana, sans-serif;
      font-size: 15px;
    }
    #login {
    max-width: 600px;
    }
 
  </style>
          <style>
            .form-control:focus {
                border-color: #ff80ff;
                box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);
            }
        </style>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap demo</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    </head>
    <body id="grid1">
    <!-- Cracion de navbar -->
    
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{url('/')}}">
      <img src="{{URL('images/DEBEDE.png')}}" width="50" height="50" class="d-inline-block align-left me-3" alt="">
      DEBEDE Music
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
      aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
          <div class="d-flex align-items-right">
            <button type="button" class="btn btn-primary pl-auto me-3 rounded-pill">
              Registrarse
            </button>
          </div>


      </ul>
    </div>
  </div>

</nav>
    <!--style="background-image:url('images/vinyls.jpg');"-->
    <div class= "container" id="login">
        <div style="height:200px;">
        </div>
        <h3 class="text-center p-4"style=" color:#ffffff">Ingrese los datos de su cuenta</h3>
        
        <form class = " border rounded-4 shadow bg-dark bg-opacity-50 border-dark p-4 fs-5 text-light">
            <div class="form-group">
                <label class="mb-2" for="exampleFormControlInput1">Email </label>
                <input type="email" class="form-control" id="mailInputLogin" placeholder="nombre@ejemplo.com" 
                oninvalid="this.setCustomValidity('Se debe seguir el formato <Texto@Texto.dominio>')"
                oninput="this.setCustomValidity('')">
            </div>
            <br>
            <div class="form-group">
                <label class="mb-3" for="inputPassword">Contraseña</label>
                <input type="password" class="form-control" id="passwordInputLogin" placeholder="**********">
            </div>
            <br>
                <button type="submit" class="btn btn-primary ms-md-5 p-3">
                Iniciar sesión
                </button>
                <a href="" class="link-success p-5">
                ¿Olvidaste tu contraseña?
              </a>
    </form>
    <br>
    <h5 class="text-center p-4" style=" color:#ffffff">¿Aún no tienes cuenta?</h5>
    <div class="d-grid col-6 mx-auto">
      <button class="btn btn-primary rounded-pill" type="button">Regístrate</button>
    </div>
    <div style="height:200px;">
        </div>
</div>
<footer class="page-footer font-small blue pt-4">

  <!-- Footer Links -->
  <div class="container-fluid text-center text-md-left">

    <!-- Grid row -->
    <div class="row">

      <!-- Grid column -->
      <div class="col-md-6 mt-md-0 mt-3">

        <!-- Content -->
        <h5 class="text-uppercase " style="color:#bbb;">
          <img src="{{URL('images/dark-DEBEDE.png')}}" width="50" height="50" class="d-inline-block align-left me-3"
            alt="">
          DEBEDE Music
        </h5>
        <p style="color:#bbb;">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Corrupti reprehenderit quia, a
          voluptas sequi ab nobis enim rem veniam? Dolore temporibus odit cum porro repudiandae impedit nulla quibusdam
          ipsam pariatur?</p>

      </div>
      <!-- Grid column -->

      <hr class="clearfix w-100 d-md-none pb-3">

      <!-- Grid column -->
      <div class="col-md-3 mb-md-3 mb-9">

        <!-- Links -->
        <h5 class="text-uppercase" style="color:white; text-align:right;">Links</h5>

        <ul class="list-unstyled" style="text-align: right;">
          <li>
            <a href="www.google.cl">Link 1</a>
          </li>
          <li>
            <a href="#!">Link 2</a>
          </li>
          <li>
            <a href="#!">Link 3</a>
          </li>
          <li>
            <a href="#!">Link 4</a>
          </li>
        </ul>

      </div>
      
    </div>
    <!-- Grid row -->

  </div>
</footer>


</body>
</html>