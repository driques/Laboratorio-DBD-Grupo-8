<!DOCTYPE html>
<html lang="es" >
     <head>
     <style>
    #grid1 {
      /*width: 1200px;*/
      min-height: 720px;
      height: auto;
      /*margin: 80px auto 0px auto;*/
      background-image: linear-gradient(to bottom,rgb(73,152,245), rgb(194,228,235), rgb(73,152,245));
      /*padding: 10px 10px; */
      overflow: auto
    }
    body {
      font-family: Verdana, sans-serif;
      font-size: 15px;
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
        <a class="navbar-brand" href="#">
        <img src="https://i.ibb.co/KKnBn4P/1-removebg-preview.png" width="40" height="40" class="d-inline-block align-mid"
            alt="">
        DEBEDE Music
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
        aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav right-left">
            <li class="nav-item">
            <a class="nav-link" aria-current="page" href="#">Quienes somos</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="#">Ayuda</a>
            </li>

            <body style="background-color:rgb(33, 37, 41);">
            <div class="d-flex align-items-right">
                <button type="button" class="btn btn-link pl-auto me-2">
                Iniciar sesión
                </button>
                <button type="button" class="btn btn-primary pl-auto me-3">
                Registrarse
                </button>
            </div>


        </ul>
        </div>
    </div>
    </nav>
    
        <div class = "position-absolute top-50 start-50 translate-middle " >
        <h3 class="text-center p-4">Ingrese los datos de su cuenta</h3>    
        <form class = "border border-dark p-4 bg-secondary bg-opacity-50 fs-5">
            <div class="form-group">
                <label for="exampleFormControlInput1">Email </label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="nombre@ejemplo.com" 
                oninvalid="this.setCustomValidity('Se debe seguir el formato <Texto@Texto.dominio>')"
                oninput="this.setCustomValidity('')">
            </div>
            <br>
            <div class="form-group">
                <label for="inputPassword">Contraseña</label>
                <input type="password" class="form-control" id="inputPassword" placeholder="**********">
            </div>
        <div class="col-auto">
            <br>
            <button type="submit" class="btn btn-primary">Confirmar</button>
        </div> 
    </form>
</div>

</body>
</html>
