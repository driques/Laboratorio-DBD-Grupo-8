<!doctype html>
<html lang="es">

<head>
    <style>
        #footerDivMusicController {
            /*width: 1200px;*/
            min-height: 200px;
            height: auto;
            /*margin: 80px auto 0px auto;*/
            background-image: linear-gradient(to bottom, rgb(138, 199, 245), rgb(57, 88, 149), rgb(31, 33, 37));
            /*padding: 10px 10px; */
            /*overflow: auto*/
        }


        #reproductor {

            background-image: linear-gradient(to bottom, rgb(31, 33, 37), rgb(58, 62, 69));

        }

        #tituloCancion {

            background-color: rgb(25, 25, 25);
            color: whitesmoke;
            text-align: center;


        }

        #controlMusic {
            margin: 5px 5px 5px 5px;
        }


        #albumImage {


            max-width: 60%;
            height: auto;
            border-radius: 8px;
            overflow: auto;
            display: center;
            margin-left: auto;
            margin-right: auto;

            z-index: 1;
        }

        #albumImageBlurred {
            position: relative;
            max-width: 40%;
            height: auto;
            border-radius: 8px;
            padding: 10px 10px;
            overflow: auto;
            display: block;
            margin-left: auto;
            margin-right: auto;
            filter: blur(4px);
            z-index: -1;
        }
        #resultados{
            background-color: black;
            color: aliceblue;
            position: absolute;
            z-index: 1;
        }

        .image-stack {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            position: relative;
            margin-left: auto;
            margin-right: auto;
        }
    </style>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Reproductor DEBEDE</title>
</head>

<body id="reproductor">
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-1">
        <img src="{{URL('images/DEBEDE.png')}}" width="40" height="40" class="d-inline-block align-left me-3" alt="">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">DEBEDE MUSIC</a>
        <div class="col-8">
            <div class="input-group">
                <input type="text" class="form-control" id="texto" placeholder="Buscar canción">
                <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
            </div>
            <div id="resultados" class="bg-ligh">
               

            </div>
        </div>
        <script> window.addEventListener('load',function(){ 
            document.getElementById("texto").addEventListener("keyup",()=>{
            if((document.getElementById("texto").value.length)>=1)
            fetch(`/song/search?texto=${document.getElementById("texto").value}`,{method:'get'})
            .then(response =>response.text())
            .then(html => {document.getElementById("resultados").innerHTML=html})
            else
            document.getElementById("resultados").innerHTML=""
            })
            });
        </script>
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a href="/">
                        <button id="controlMusic" type="submit" class="btn btn-secondary btn"><span class="bi bi-box-arrow-right"></span> </button>
                    </a>
                </li>
            </ul>
    </nav>
    <div>

        <div style="position:relative">
            <img id="albumImageBlurred" src="{{URL('images/album_portada.jpg')}}" alt="Portada" class="heaven" />
            <div style="position:absolute; top: 30%; left:45%;">
                <img border="0" id="albumImage" src="{{URL('images/album_portada.jpg')}}" alt="Portada" class="eye" width="300" height="300" />

            </div>
        </div>
        <div id="clear">
        </div>

    </div>
    <script>

        function getSong(nombreCancion){
            document.getElementById("tituloCancion").innerHTML = nombreCancion;
        }

        var urlMusic = null;
        var music = null;

        function getUrl(newUrl){
            urlMusic = newUrl;
            var audioElem = new Audio(newUrl);
            music = audioElem;
            console.log(urlMusic);

            
        }
        function limpiar() {
            document.getElementById("texto").value = "";
            document.getElementById("resultados").value=document.getElementById("clear").value;
}
        

        function playMusic() {
            music.play();
           
        }

        function stopMusic() {
                music.pause();
            
        }
          

       
    </script>
    <h1 id="tituloCancion">
        Sin reproducción
    </h1>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
<footer class="page-footer fixed-bottom bg-dark bg-opacity-50 font-small blue pt-4 ">

    <!-- Footer Links -->
    <div class="container-fluid  ">

        <!-- Grid row -->


        <!-- Grid column -->
        <div class="col-auto p-2 text-center">
            <!-- Content -->

            <button id="controlMusic" type="submit" class="btn btn-primary btn"><span class="bi-arrow-left"></span>
            </button>
            <button id="controlMusic" type="submit" class="btn btn-primary btn-lg" onclick="playMusic()"><span class="bi-play"></span></button>
            <button id="controlMusic" type="submit" class="btn btn-secondary btn-lg" onclick="stopMusic()"><span class="bi-pause"></span></button>
            <button id="controlMusic" type="submit" class="btn btn-primary btn"><span class="bi-arrow-right"></span></button>
            </button>
            <!-- Grid column -->
            <div class="col  ">
            </div>
            <!-- Grid column -->
            <div class="col col-lg-4 text-center mt-2">



            </div>


            <!-- Grid row -->

        </div>
</footer>

</html>