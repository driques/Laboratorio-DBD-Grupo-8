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
  <title>DBD music - Registro de usuario</title>
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
              <a href="{{url('/home/login2')}}">
                <button type="button" class="btn btn-outline-secondary me-3">
                  Iniciar sesión
                </button>
              </a>


        </ul>
      </div>
    </div>

  </nav>

  <section id="grid1" class="vh-100">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">

                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Registro de usuario</p>

                  <form method="POST" action="{{URL('/users/storeWithPay')}}"class="mx-1 mx-md-4" method="POST" enctype="multipart/form-data"name="form" id="forms">

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="name" name="name" value="" class="form-control" />
                        <label class="form-label" for="name">Tu nombre</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" id="email" name="email" value="" class="form-control" />
                        <label class="form-label" for="email">Tu email</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" id="password" name="password" value="" class="form-control" />
                        <label class="form-label" for="password">Contraseña</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="date" id="birth_year" name="birth_year" value="" class="form-control" />
                        <label class="form-label" for="birth_year">fecha de nacimiento</label>
                      </div>
                    </div>


                    <div class="mb-3">
                      <label for="id_pais" class="form-label">País</label>
                      <select class="form-select mb-4" aria-label="Seleccione un país:" name="id_pais" id="id_pais">
                        @foreach ($countries as $country)
                        <option value="{{$country->id}}">{{$country->name_country}}</option>
                        @endforeach
                      </select>
                    </div>




                      <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" id="cardOwner" name="cardOwner" value="" class="form-control" />
                        <label class="form-label" for="name">Nombre Propietario Tarjeta</label>
                      </div>
                    </div>


                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input class="form-control" type="text" placeholder="0000 0000 0000 0000" id="creditCard" name="creditCard">
                        <label class="form-label" for="name">Tarjeta de credito</label>
                      </div>
                    </div>

          
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" class="bank-card__field" placeholder="MM" maxlength="2"  id="month" name ="month" required>
                        <label class="form-label" for="name">Mes</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" class="bank-card__field" placeholder="YY" maxlength="2" id="year" name="year" required>
                        <label class="form-label" for="name">Año</label>
                      </div>
                    </div>

                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input class="form-control" id="cvv" type="text" name="cvv" placeholder="123">
                        <label class="form-label" for="name">Cvv</label>
                      </div>
                    </div>

            
                          <button type="submit" class="btn btn-primary btn-lg" id="registerButton" disabled>Registrate!</button>
                        </div>
                     </form>
                    <script>
                        function redirect(){
                            window.location.href = "/";
            
                        }
                        function validNumber(input) {
                        let regex = /^\d*$/;
                        if (!input.search(regex))
                            return input;
                        else return false;
                        }
                        function validText(input) {
                        let regex = /^[a-zA-Z\s]*$/;
                        if (regex.test(input))
                            return input;
                        else return false;
                        }
                        function validMonth(input) {
                        let regex = /^\d{2}$/;
                        if (regex.test(input))
                            return input;
                        else return false;
                        }
                        function validYear(input) {
                        let regex = /^\d{2}$/;
                        if (regex.test(input))
                            return input;
                        else return false;
                        }
                        function validCard(numberCard) {
                          
                        if (numberCard) {

                            let sumaTotal = 0;
                            let revserNum = [...numberCard].reverse(); // obteniendo array inverso  
                            for (let index = 1; index < revserNum.length; index = index + 2) {
                            revserNum[index] = revserNum[index] * 2;
                            if (revserNum[index] >= 10) {
                                revserNum[index] = revserNum[index] - 9;
                            }
                            }
                            for (let value of revserNum) {
                            sumaTotal = sumaTotal + parseInt(value);
                            }
                
                            if (sumaTotal % 10 === 0) {
                            document.getElementById("registerButton").disabled=false;
                            console.log('Valido');
                            return true;
                            
                            }
                        } else{
                            console.log("Falso");
                            return false;
            
                        } 
                        }
            
                        function validateAll(credit,name,MM,YY,cvv){
                          console.log("aquiestoy chaval");
                          if(validCard(credit)&&validText(name)&&validMonth(MM)&&validYear(YY)&&validNumber(cvv)){
                            console.log("todo ok");
                          
                        }
                        }
            
                        var form = document.getElementById("forms");
                        form.onclick = function(formulario){
                        var credit = document.getElementById("creditCard").value;
                        var name = document.getElementById("name").value;
                        console.log(name);
                        var MM = document.getElementById("month").value;
                        console.log(name);
                        var YY = document.getElementById("year").value;
                        console.log(YY);
                        var cvv = document.getElementById("cvv").value;
                        console.log(cvv);
                        validateAll(credit,name,MM,YY,cvv);
                    }
                        </script>
            
                    </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer class="page-footer font-small blue pt-4">

    <!-- Footer Links -->
    <div class="container-fluid text-center text-md-left">

      <!-- Grid row -->
      <div class="row">

        <!-- Grid column -->
        <div class="col-md-6 mt-md-0 mt-3">

          <!-- Content -->
          <h5 class="text-uppercase " style="color:#bbb;">
            <img src="{{URL('images/dark-DEBEDE.png')}}" width="50" height="50" class="d-inline-block align-left me-3" alt="">
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
  <!-- Footer -->

</body>

</html>