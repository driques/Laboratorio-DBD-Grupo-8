<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        h1 {text-align: center;}
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
    <style>
        .form-control:focus {
            border-color: #ff80ff;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body id="grid1">
    <!-- Cracion de navbar -->


    @include('home.navbar')
    <div class="container">
        <div style="height:100px;">
        </div>
        <div class="row text-center">
            <a >
                <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="300" height="300" class="rounded-circle">
            </a>
        </div>
        <br><br>
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h1>Editar perfil</h1>
                    <label for="name" class="form-label">Nombre</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1">{{auth()->user()->name}}</span>
                        <input type="text" id="name" class="form-control" placeholder="Ingresa tu nuevo nombre" aria-label="name" aria-describedby="basic-addon1">
                    </div>
                    <label for="email" class="form-label">Email</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1">{{auth()->user()->email}}</span>
                        <input type="text" id="email" class="form-control" placeholder="Ingresa tu nuevo email" aria-label="email" aria-describedby="basic-addon1">
                    </div>
                    <label for="password" class="form-label">Contraseña</label>
                    <div class="input-group mb-2">
                        <span class="input-group-text" id="basic-addon1">Contraseña</span>
                        <input type="password" id="password" class="form-control" placeholder="Ingresa tu nueva contraseña" aria-label="password" aria-describedby="basic-addon1">
                    </div>
                    <label class="form-label">Fecha de nacimiento actual</label>
                    <span class="d-block p-2 bg-white border rounded">{{auth()->user()->birth_year}}</span>
                    <div class="d-flex flex-row mb-2">
                      <div class="form-outline flex-fill">
                      <label class="form-label" for="birth_year">Fecha de nacimiento nueva</label>
                        <input type="date" id="birth_year" name="birth_year" value="" class="form-control" />
                        
                      </div>
                    </div>
                    <label for="password" class="form-label">País de residencia actual</label>
                    <span class="d-block p-2 bg-white border rounded">pais usuario</span>
                    <div class="mb-2">
                      <label for="id_pais" class="form-label">País</label>
                      <select class="form-select mb-4" aria-label="Seleccione un país:" name="id_pais" id="id_pais">
                      </select>
                    </div>
                    <div class="row gutters">
                        <div class="col ">
                            <br>
                            <div class="d-grid gap-2 d-flex justify-content-md-end">
                                <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                <button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br><br>
    </div>
</body>