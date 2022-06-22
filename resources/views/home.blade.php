<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        #grid1{
            /*width: 1200px;*/
            min-height: 720px;
            height: auto;
            /*margin: 80px auto 0px auto;*/
            background-image: linear-gradient(to bottom, rgb(63, 191, 203), rgb(196,0,84),rgb(31, 33, 37));
            /*padding: 10px 10px; */
            overflow:auto
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEBEDE Music</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="resources/home.css" rel="stylesheet" type="text/css">
</head>

<body style="background-color:rgb(33, 37, 41);">
    <!-- Cracion de navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="https://i.ibb.co/KKnBn4P/1-removebg-preview.png" width="40" height="40" class="d-inline-block align-mid" alt="">
            DEBEDE Music
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
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
      <div id="grid1">
        <!-- Carousel images of albums  data-bs-ride="carousel"-->
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
               <h1>
                 Text 1
               </h1>
               <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, consequatur ratione. Ullam eaque rerum mollitia iure, aliquid quia molestias rem atque magni maiores architecto dignissimos voluptas esse, porro praesentium ipsam!</p>
              </div>
              <div class="carousel-item">
                <h1>
                  Text 2
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, consequatur ratione. Ullam eaque rerum mollitia iure, aliquid quia molestias rem atque magni maiores architecto dignissimos voluptas esse, porro praesentium ipsam!</p>
              
              </div>
              <div class="carousel-item">
                <h1>
                  Text 3
                </h1>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis, consequatur ratione. Ullam eaque rerum mollitia iure, aliquid quia molestias rem atque magni maiores architecto dignissimos voluptas esse, porro praesentium ipsam!</p>
              
              </div>
            </div>
          </div>
          <!--Termino Div-->
       </div>





       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>