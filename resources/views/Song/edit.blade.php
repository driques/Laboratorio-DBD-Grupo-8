@extends('layouts.index')

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
    <title>DBD music - Albumes</title>
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

    @section('contenido')
   
    <h2>Edicion de canción</h2>
 
    <form method="post" action="{{URL('/songs/update/'.strval($song->id))}}" >
        @method('put') 
        @csrf
        <div class="form-group">
            <div class="mb-3">
                <label for="" class="from-label">Nuevo nombre canción</label>
                <input id="nombre_cancion" name="nombre_cancion" type="text" class="form-control" tabindex="1" value="{{ $song->nombre_cancion }}"></input>
                <label for="" class="from-label">Restricción etaria</label>
                <input id="restriccion_etaria" name="restriccion_etaria" type="text" class="form-control" tabindex="1" value="{{ $song->restriccion_etaria }}"></input>
                <label for="" class="from-label">Likes</label>
                <input id="likes" name="likes" type="text" class="form-control" tabindex="1" value="{{ $song->likes }}"></input>
                <label for="" class="from-label">Reproducciones</label>
                <input id="reproducciones" name="reproducciones" type="text" class="form-control" tabindex="1" value="{{ $song->reproducciones }}"></input>
                <label for="" class="from-label">Id albúm</label>
                <input id="id_album" name="id_album" type="text" class="form-control" tabindex="1" value="{{ $song->id_album }}"></input>
                <label for="" class="from-label">Id genero</label>
                <input id="id_genre" name="id_genre" type="text" class="form-control" tabindex="1" value="{{ $song->id_genre }}"></input>
                <label for="" class="from-label">Id artista</label>
                <input id="id_artist" name="id_artist" type="text" class="form-control" tabindex="1" value="{{ $song->id_artist }}"></input>
                <label for="" class="from-label">Duración canción</label>
                <input id="song_duration" name="song_duration" type="text" class="form-control" tabindex="1" value="{{ $song->song_duration}}"></input>
                <label for="" class="from-label">Url canción</label>
                <input id="url_cancion" name="url_cancion" type="text" class="form-control" tabindex="1" value="{{ $song->url_cancion}}"></input>
            </div>
            <a href="/songs2" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-danger" tabindex="4">Guardar cambios</button>
    </form>


    @endsection

</body>

</html>