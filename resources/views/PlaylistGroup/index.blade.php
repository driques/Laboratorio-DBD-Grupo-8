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
    <title>DBD music - Admin->Playlists</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body id="grid1">

    @include('home.navbar')

    @section('contenido')
    <a href= "playlists/create" class="btn btn-primary">Crear playlist</a>
    <table class="table table-dark table-striped mt-4">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre playlist</th>
                <th scope="col">Likes totales</th>
                <th scope="col">Id del creador</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($playlist_groups as $playlist_group)
            <tr>
                <td> {{$playlist_group->id}}</td>
                <td> {{$playlist_group->id_cancion}}</td>
                <td> {{$playlist_group->id_playlist}}</td>
                <td>
                <form action="playlist_group/delete/{{$playlist_group->id}}" method = "POST">
                        <a href="playlist_group/{{$playlist_group->id}}/edit" class="btn btn-info">Editar playlist</a>
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-danger">Eliminar playlist</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>

    </table>
    @endsection

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

        <ul class="list-unstyled"  >
          <li>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="White" class="bi bi-instagram" viewBox="0 0 16 16">
  <path d="M8 0C5.829 0 5.556.01 4.703.048 3.85.088 3.269.222 2.76.42a3.917 3.917 0 0 0-1.417.923A3.927 3.927 0 0 0 .42 2.76C.222 3.268.087 3.85.048 4.7.01 5.555 0 5.827 0 8.001c0 2.172.01 2.444.048 3.297.04.852.174 1.433.372 1.942.205.526.478.972.923 1.417.444.445.89.719 1.416.923.51.198 1.09.333 1.942.372C5.555 15.99 5.827 16 8 16s2.444-.01 3.298-.048c.851-.04 1.434-.174 1.943-.372a3.916 3.916 0 0 0 1.416-.923c.445-.445.718-.891.923-1.417.197-.509.332-1.09.372-1.942C15.99 10.445 16 10.173 16 8s-.01-2.445-.048-3.299c-.04-.851-.175-1.433-.372-1.941a3.926 3.926 0 0 0-.923-1.417A3.911 3.911 0 0 0 13.24.42c-.51-.198-1.092-.333-1.943-.372C10.443.01 10.172 0 7.998 0h.003zm-.717 1.442h.718c2.136 0 2.389.007 3.232.046.78.035 1.204.166 1.486.275.373.145.64.319.92.599.28.28.453.546.598.92.11.281.24.705.275 1.485.039.843.047 1.096.047 3.231s-.008 2.389-.047 3.232c-.035.78-.166 1.203-.275 1.485a2.47 2.47 0 0 1-.599.919c-.28.28-.546.453-.92.598-.28.11-.704.24-1.485.276-.843.038-1.096.047-3.232.047s-2.39-.009-3.233-.047c-.78-.036-1.203-.166-1.485-.276a2.478 2.478 0 0 1-.92-.598 2.48 2.48 0 0 1-.6-.92c-.109-.281-.24-.705-.275-1.485-.038-.843-.046-1.096-.046-3.233 0-2.136.008-2.388.046-3.231.036-.78.166-1.204.276-1.486.145-.373.319-.64.599-.92.28-.28.546-.453.92-.598.282-.11.705-.24 1.485-.276.738-.034 1.024-.044 2.515-.045v.002zm4.988 1.328a.96.96 0 1 0 0 1.92.96.96 0 0 0 0-1.92zm-4.27 1.122a4.109 4.109 0 1 0 0 8.217 4.109 4.109 0 0 0 0-8.217zm0 1.441a2.667 2.667 0 1 1 0 5.334 2.667 2.667 0 0 1 0-5.334z"/>
</svg>
            <a href="https://www.instagram.com/DEBEDEMUSIC">Instagram </a>
          </li>
          <li>
          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-facebook" viewBox="0 0 16 16">
  <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
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