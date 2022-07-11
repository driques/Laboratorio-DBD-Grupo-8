<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        #rellenarimg {
            object-fit: fill;
        }

        #grid1 {
            /*width: 1200px;*/
            min-height: 1000px;
            height: auto;
            /*margin: 80px auto 0px auto;*/
            background-image: linear-gradient(to bottom, rgb(138, 199, 245), rgb(57, 88, 149), rgb(31, 33, 37));
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
    <title>DBD music - Registro de canción</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body id="grid1">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{url('/')}}">
                <img src="{{URL('images/DEBEDE.png')}}" width="50" height="50" class="d-inline-block align-left me-3" alt="">
                DEBEDE Music
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

    </nav>
@auth
    <section id="grid1" class="vh-100">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-lg-12 col-xl-11">
                    <div class="card text-black" style="border-radius: 25px;">
                        <div class="card-body p-md-5">
                            <div class="row justify-content-center">
                                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                                    <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registro de canción</p>

                                    <form class="mx-1 mx-md-4" action="{{URL('/songs/store')}}" method="POST" enctype="multipart/form-data">

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example1c" class="form-control" name="nombre_cancion" minlength="3" maxlength="20" required/>
                                                <label class="form-label" for="form3Example1c">Nombre canción</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                            <p>Restricción etaria:</p>
                                            <input type="radio" id="no" name="restriccion_etaria" value=0 required>
                                                <label for="no">No</label><br>
                                                <input type="radio" id="no" name="restriccion_etaria" value=1 required>
                                                <label for="+13">+13</label><br>
                                                <input type="radio" id="+13" name="restriccion_etaria" value=2 required>
                                                <label for="+18">+18</label><br>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="form3Example3c" class="form-control" name="id_album" required/>
                                                <label class="form-label" for="form3Example3c">Id album</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="form3Example4c" class="form-control" name="id_genre" required/>
                                                <label class="form-label" for="form3Example4c">Id genero</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="hidden" name="id_artist" value= "{{auth()->user()->id}}">
                                                <label class="form-label" for="form3Example4cd"></label>
                                            </div>
                                        </div>


                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="number" id="form3Example4cd" class="form-control" name="song_duration" required/>
                                                <label class="form-label" for="form3Example4cd">Duración cancion</label>
                                            </div>
                                        </div>

                                        <div class="d-flex flex-row align-items-center mb-4">
                                            <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                                            <div class="form-outline flex-fill mb-0">
                                                <input type="text" id="form3Example4cd" class="form-control" name="url_cancion" required/>
                                                <label class="form-label" for="form3Example4cd">Url de la canción</label>
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                                            <a href="/app">
                                                <button type="submit" class="btn btn-primary btn-lg">Subir</button>
                                            </a>
                                        </div>


                                    </form>

                                </div>
                                <div class="col-md-6 col-lg-4 col-xl-7 d-flex order-1 order-lg-2">

                                    <img src="{{URL('images/vinyls.jpg')}}" class="img-fluid" alt="Sample image" style="border-radius: 100px;">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endauth

    <!-- Footer -->

</body>

</html>