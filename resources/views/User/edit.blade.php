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
   
    <h2>Editar restriccion</h2>
    <form method="post" action="{{URL('/users/update2/'.strval($user->id))}}" >
        @method('put') 
        @csrf
        <div class="form-group">
        <div class="mb-3">
            <label for="" class="from-label">Nombre de usuario</label>
            <input id="name" name="name" type="text" class="form-control" tabindex="1" value="{{$user->name}}"></input>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">email</label>
            <input id="email" name="email" type="text" class="form-control" tabindex="2" value="{{$user->email}}"></input>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">password</label>
            <input id="password" name="password" type="text" class="form-control" tabindex="3" value="{{$user->password}}"></input>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">plan</label>
            <input id="plan" name="plan" type="text" class="form-control" tabindex="4" value="{{$user->plan}}"></input>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">ano de nacimiento</label>
            <input id="birth_year" name="birth_year" type="text" class="form-control" tabindex="5" value="{{$user->birth_year}}"></input>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">id_rol</label>
            <input id="id_rol" name="id_rol" type="text" class="form-control" tabindex="6" value="{{$user->id_rol}}"></input>
        </div>
        <div class="mb-3">
            <label for="" class="from-label">id_rol</label>
            <input id="id_pais" name="id_pais" type="text" class="form-control" tabindex="6" value="{{$user->id_pais}}"></input>
        </div>
            <a href="/users" class="btn btn-secondary" tabindex="5">Cancelar</a>
            <button type="submit" class="btn btn-danger" tabindex="4">Guardar cambios</button>
    </form>


    @endsection

</body>

</html>