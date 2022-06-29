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
    <a class="navbar-brand" href="/">
      <img src="{{URL('images/DEBEDE.png')}}" width="50" height="50" class="d-inline-block align-left me-3" alt="">
      DEBEDE Music
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNavDropdown">
    <ul class="navbar-nav right">
        
        <li class="nav-item justify-content-end">
          <a class="nav-link" aria-current="page" href="#">¿Quiénes somos?</a>
        </li>
        <li class="nav-item justify-content-end">
          <a class="nav-link" href="#">Ayuda</a>
        </li>
        
        <body style="background-color:rgb(33, 37, 41);">
        </ul>
    </div>
  </div>

</nav>
<div class="container">
      <div class="row text-center">
        <div class="col ">
          <div class="row">
            <div class="col">
              <br><br><br><br><br><br><br><br><br>
              <h1 style="font-size: 80px; text-align: center; ">404</h1>
              <h1>No se encuentra la página</h1>
              <a href="{{url('/')}}">
              <br> 
              <button class="btn btn-success rounded-pill " type="button">Haz click aquí para volver a la página principal</button>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
</body>
</html>