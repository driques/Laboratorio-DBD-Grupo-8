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
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>DBD music - Registro de usuario</title>
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
    
    <div class= "container" id="login">
        <div style="height:200px;">
        </div>
        <h3 class="text-center p-4">Formulario de registro de nuevo usuario</h3>    
        <form class = "border border-dark p-4 bg-secondary bg-opacity-50 fs-5">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre@ejemplo.com" 
                oninvalid="this.setCustomValidity('Se debe seguir el formato <Texto@Texto.dominio>')"
                oninput="this.setCustomValidity('')">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleFormControlInput1">Nombre </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Primer nombre" 
                oninvalid="this.setCustomValidity('Se debe seguir el formato <Texto@Texto.dominio>')"
                oninput="this.setCustomValidity('')">
            </div>
            <br>
            <div class="form-group">
                <label for="exampleFormControlInput1">Apellido </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Apellido" 
                oninvalid="this.setCustomValidity('Se debe seguir el formato <Texto@Texto.dominio>')"
                oninput="this.setCustomValidity('')">
            </div>
            <br>
            <div class="form-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="**********">
            </div>
            <div class="d-flex align-items-right">
            <br>
                <button type="button" class="btn btn-link pl-auto me-2">
                Iniciar sesión
                </button>
                <button type="button" class="btn btn-primary pl-auto me-3">
                Registrarse
                </button>
            </div> 
    </form>
    <div style="height:200px;">
        </div>
</div>
<footer class="bg-success"><h1>aca futer</h1>
</footer>


</body>
</html>
