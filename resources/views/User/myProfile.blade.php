<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap');
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
        #barUser{
            border-color: #3220a9;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(28, 90, 171, 0.5);
            font-family: 'Roboto', sans-serif;

        }
        .form-control:focus {
            border-color: #211168;
            box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.075) inset, 0px 0px 8px rgba(255, 100, 255, 0.5);
        }
    </style>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mi perfil</title>
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
                    <h1>{{auth()->user()->name}}</h1>
                   
                    <h1 id="barUser">Seguidores</h1>
                    <h1 id="seguidores"></h1>
                    <h1 id="barUser">Seguidos</h1>
                    <h1 id="seguidos"></h1>
                    <h1 id="barUser">Playlists</h1>
                    <h1 id="playlists"></h1>
            </div>
            <script>

            console.log(`/follow_user/searchFollowsUser/{{auth()->user()->id}}`,"aqui toy");
            fetch(`/follow_user/searchFollowsUser/?texto={{auth()->user()->id}}`, {
                method: 'get'
              })
              .then(response => response.text())
              .then(html => {
                document.getElementById("seguidores").innerHTML = html
              })
              fetch(`/follow_user/searchFollowerUser/?texto={{auth()->user()->id}}`, {
                method: 'get'
              })
              .then(response => response.text())
              .then(html => {
                document.getElementById("seguidos").innerHTML = html
              })
              fetch(`/playlist/searchPlaylistByOwner/?texto={{auth()->user()->id}}`, {
                method: 'get'
              })
              .then(response => response.text())
              .then(html => {
                document.getElementById("playlists").innerHTML = html
              })

              
            </script>
        </div>


        <!-- Aqui debo mostrar las playlists-->
        <div class="col">
            <div class="card h-100">
                <div class="card-body">
                    <h1 id="barUser">Playlists públicas</h1>
                    <h1>1 1 1 </h1>
            </div>
        </div>
        <br><br>
    </div>
</body>