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

    #carousel-images {
      z-index: 0;
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

</head>

@auth
<p style="display:none;" id="id_rol">{{auth()->user()->id_rol}}</p>
<script>
  role = document.getElementById("id_rol").innerHTML;
  if (role == 1) {
    window.location.href = "/crudmenu";
  };
</script>
@endauth
<!-- Creacion de navbar -->
@include('home.navbar')
<div id="grid1">
  <h1 style="color: white; text-align:center;"></h1>

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
  @auth

  <h1 style="box-sizing:border-box; display:block; font-size: 80px; text-align: center; color:#bbb; ">Ranking DEBEDE</h1>
  <div style="  text-align: center; ">
    <a href="/home/ranking" <button class="btn btn-lg btn-primary rounded-pill">Ve el top 10</button>
    </a>
  </div>

  @endauth

  </br>
  @guest
  <h1 style="box-sizing:border-box; display:block; font-size: 80px; text-align: center; ">Todos tus gustos. </h1>
  <h1 style="font-size: 80px; text-align: center;">La musica que amas. </h1>
  <h1 style="font-size: 80px; text-align: center; color:#bbb;">Al mejor precio.</h1>
  <div class="col text-center">
    <a href="/home/register" <button class="btn btn-lg btn-primary rounded-pill">Registrate aquí</button>
    </a>
  </div>
  <br>
  </br>
  <br>
  </br>
  <br>
  </br>
  <br>
  </br>
  @endguest
  <!--Termino Div-->
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>
<footer class="page-footer fixed-bottom bg-dark bg-opacity-50 font-small blue pt-4 ">

  <!-- Footer Links -->
  <div class="container-fluid  ">

    <!-- Grid row -->
    <div class="row ">

      <!-- Grid column -->
      <div class="col text-center col-lg-4 mt-1">

        <!-- Content -->
        <h5 class="text-uppercase " style="color:#bbb;">
          <img src="{{URL('images/dark-DEBEDE.png')}}" width="50" height="50" class="d-inline-block align-left me-3" alt="">
          DEBEDE Music
        </h5>
      </div>
      <!-- Grid column -->
      <div class="col  ">
      </div>
      <!-- Grid column -->
      <div class="col col-lg-4 text-center mt-2">

        <!-- Links -->
        <h5 class="text-uppercase" style="color:white;">Nuestras redes</h5>

        <ul class="list-unstyled">
          <li>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="White" class="bi bi-instagram" viewBox="0 0 16 16">
              <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z" />
            </svg>
            <a href="https://www.instagram.com/DEBEDEMUSIC">Instagram </a>
          </li>
          <li>
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-facebook" viewBox="0 0 16 16">
              <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z" />
            </svg>
            <a href="#!">Facebook</a>
          </li>
        </ul>

      </div>

    </div>
    <!-- Grid row -->

  </div>
</footer>

</html>