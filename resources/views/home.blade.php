<!DOCTYPE html>
<html lang="es">

<head>
  <style>
    h1 {
      font-family: 'Roboto',
        sans-serif;
    }

    a {
      font-family: 'Roboto',
        sans-serif;
    }

    #grid1 {
      /*width: 1200px;*/
      min-height: 720px;
      height: auto;
      /*margin: 80px auto 0px auto;*/
      background-image: linear-gradient(to bottom, rgb(46, 68, 168), rgb(138, 199, 245), rgb(57, 88, 149), rgb(31, 33, 37));
      /*padding: 10px 10px; */
      overflow: auto
    }

    #grid2 {
      /*width: 1200px;*/
      min-height: 360px;
      height: auto;
      /*margin: 80px auto 0px auto;*/
      background-image: linear-gradient(to bottom, rgb(32, 33, 38), rgb(21, 24, 31), rgb(6, 7, 7));
      /*padding: 10px 10px; */
      overflow: auto
    }

    * {
      box-sizing: border-box;
    }

    body {
      font-family: Verdana, sans-serif;
    }

    .mySlides {
      display: none;
    }

    img {
      vertical-align: middle;
    }

    /* Slideshow container */
    .slideshow-container {
      max-width: 1000px;
      position: relative;
      margin: auto;
    }

    /* Caption text */
    .text {
      color: #f2f2f2;
      font-size: 15px;
      padding: 8px 12px;
      position: absolute;
      bottom: 8px;
      width: 100%;
      text-align: center;
    }

    /* Number text (1/3 etc) */
    .numbertext {
      color: #f2f2f2;
      font-size: 12px;
      padding: 8px 12px;
      position: absolute;
      top: 0;
    }

    /* The dots/bullets/indicators */
    .dot {
      height: 15px;
      width: 15px;
      margin: 0 2px;
      background-color: #bbb;
      border-radius: 50%;
      display: inline-block;
      transition: background-color 0.6s ease;
    }

    /* Fading animation */
    .fade {
      animation-name: fade;
      animation-duration: 1.5s;
    }

    @keyframes fade {

      from {
        opacity: .4
      }

      to {
        opacity: 1
      }
    }

    /* On smaller screens, decrease text size */
    @media only screen and (max-width: 300px) {
      .text {
        font-size: 11px
      }
    }

    .project {
      display: block;
      width: 100%;
      margin: 1em 0;
      cursor: pointer;
    }

    figure {
      margin: 0;
      padding: 0;
    }

    .project figure img {
      width: 100%;
      display: block;
      object-fit: cover;
      height: 300px;
    }

    /*Project fig captopn*/
    .project h3 {
      color: white;
      margin: 0;
    }

    .cta {
      margin: .5em 0;
    }

    @media screen and (min-width:960px) {
      .img-wrapper {
        max-width: 1400px;
        margin: 0 auto;

      }

      .img-container {
        display: flex;
        grid-gap: 1em;
      }

      .project figure img {
        position: relative;
        z-index: 500;
        transition: transform 0.3s;
      }

      .project figure:hover img {
        transform: translateY(90px);
      }


    }
  </style>
  <link rel="stylesheet" type="text/css" href="/resources/css/home.css" media="screen" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>DEBEDE Music</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>
<!-- Cracion de navbar -->

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
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
            <button type="button" class="btn btn-outline-secondary me-3">
              Iniciar sesión
            </button>
            <button type="button" class="btn btn-primary pl-auto me-3 rounded-pill">
              Registrarse
            </button>
          </div>


      </ul>
    </div>
  </div>

</nav>
<div id="grid1">

  <div id="carousel-images" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">

        <section class="img-section">
          <div class="img-wrapper">
            <div class="img-container">
              <a class="project" href="#">
                <figure>

                  <img src="{{URL('images/1.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/2.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/3.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/4.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/5.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/6.jpg')}}" alt="Image 1">
                </figure>
              </a>
            </div>

          </div>

        </section>

      </div>
      <div class="carousel-item">
        <section class="img-section">
          <div class="img-wrapper">
            <div class="img-container">
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/7.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/8.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/9.jpeg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/10.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/11.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/12.jpg')}}" alt="Image 1">
                </figure>
              </a>
            </div>

          </div>

        </section>
      </div>
      <div class="carousel-item">
        <section class="img-section">
          <div class="img-wrapper">
            <div class="img-container">
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/13.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/14.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/15.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/16.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/17.jpg')}}" alt="Image 1">
                </figure>
              </a>
              <a class="project" href="#">
                <figure>
                  <img src="{{URL('images/18.png')}}" alt="Image 1">
                </figure>
              </a>
            </div>

          </div>

        </section>
      </div>

    </div>


  </div>
  <h1 style="box-sizing:border-box; display:block; font-size: 80px; text-align: center; ">Todos tus gustos. </h1>
  <h1 style="font-size: 80px; text-align: center;">La musica que amas. </h1>
  <h1 style="font-size: 80px; text-align: center; color:#bbb;">Al mejor precio.</h1>

  <div class="col text-center">
    <button class="btn btn-primary rounded-pill">Registrate aquí</button>
  </div>
  <!--Termino Div-->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<!-- Footer -->
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
<!-- Footer -->

</html>