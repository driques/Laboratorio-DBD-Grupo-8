<!DOCTYPE html>
<html lang="es">

<head>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap');
        h1 {text-align: center;}
        #grid1 {
            /*width: 1200px;*/
            min-height: 100vh;
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
                   
                    <h1 id="name_user"></h1>
                    <script>
                       
                   let para=(new URL(document.location)).searchParams;
                   let thisUser=para.get("name");
                   document.getElementById("name_user").innerHTML = thisUser;
                        
                   </script>
                   
                    <h1 id="barUser">Seguidores</h1>
                    <h1 id="seguidores"></h1>
                    <h1 id="barUser">Seguidos</h1>
                    <h1 id="seguidos"></h1>
                    <h1 id="barUser">Playlists</h1>
                    <h1 id="playlists"></h1>
            </div>
            <script>
                 console.log("Empiezo");
            let params=(new URL(document.location)).searchParams;
            let id_user=params.get("id");
            console.log("estoy aqui",id_user);
            
            console.log(`/follow_user/searchFollowsUser/${id_user}`,"aqui toy");


            fetch(`/follow_user/searchFollowsUser/?texto=${id_user}`, {
                method: 'get'
              })
              .then(response => response.text())
              .then(html => {
                document.getElementById("seguidores").innerHTML = html
              })
              fetch(`/follow_user/searchFollowerUser/?texto=${id_user}`, {
                method: 'get'
              })
              .then(response => response.text())
              .then(html => {
                document.getElementById("seguidos").innerHTML = html
              })
              fetch(`/playlist/searchPlaylistByOwner/?texto=${id_user}`, {
                method: 'get'
              })
              .then(response => response.text())
              .then(html => {
                document.getElementById("playlists").innerHTML = html
              })

              function redirectToSong(){
                let params=(new URL(document.location)).searchParams;
                let id_user=params.get("id");
                window.location = "/user/profile/songs/?id_artist="+id_user;

              }
            </script>

                <div style="  text-align: center; ">


    <a onclick="redirectToSong()" <button class="btn btn-lg btn-primary rounded-pill">Ver canciones</button>
    </a>
  </div>

        </div>
        <br><br>
    </div>
</body>