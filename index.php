<?php 
session_start(); 

if (isset($_SESSION['acceso'])){
  if ($_SESSION['acceso'] == true){
    header('Location:views/');
  }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="views/css/style.css">
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <div class="col-sm container-fluid">
      <img class="card-img-top" src="views/img/login.jpg" alt="Card image cap">
    </div>
    <div class="col-sm row  align-items-center">
      <div class="card mx-auto">
        <div id="formContent">
            <div class="fadeIn first title">
              <img src="views/img/LOGO W-02.png"  style="background-color: black;" id="icon" alt="User Icon" />
            </div>         
            <form>
              <div  id="validateUser" style="width: 85%; margin: 0 auto;" class="alert alert-danger" role="alert">
                Tiene que ingresar su usuario
              </div>
              <input type="text" id="nomuser" class="fadeIn second" name="login" placeholder="usuario">
              <div  id="validateContra" style="width: 85%; margin: 0 auto;" class="alert alert-danger" role="alert">
                Tiene que ingresar su Contraseña
              </div>
              <input type="text" id="claveuser" class="fadeIn third" name="login" placeholder="contraseña">              
              <div class="col-md-12 btnSec">
                  <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" style="background-color: #f6f6f6;" href="#"><img style="margin: 2px 13px 3px 0px;  width:8%" src="views/img/logoGoogle.png">Continuar con Google</a>
              </div>
              <div class="col-md-12 btnSec">
                  <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" style="background-color: #f6f6f6;" href="#"><img style="margin: 2px 13px 3px 0px;  width:8%" src="views/img/logFb.png">Continuar con Google</a>
              </div>
              
            <input id="acceder"  class="fadeIn fourth btn btn-dark" value="Iniciar Sesion">
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>

  

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script>
    $(document).ready(function() {
      $('#validateUser').hide();
      $('#validateContra').hide();
      function signin(){
        if($("#nomuser").val() != "" && $("#claveuser").val() != ""){
          $.ajax({
            url: 'controllers/usuario.controller.php',
            type: 'GET',
            data: {
              op          : 'login',
              username    : $("#nomuser").val(),
              contraseña  : $("#claveuser").val()
            },
            success: function (result){
              if ($.trim(result) == ""){
                //Ingresa al dashboard
                window.location.href = 'views/'
              } else {
                alert(result);
              }
            }
          });
        }
        if($("#nomuser").val() != "" || $("#claveuser").val()!="" ){
          $('#validateUser').hide();
        }
        if($("#claveuser").val()!="" ){
          $('#validateUser').hide();
        }
        if($("#nomuser").val() == ""){
          $('#validateUser').show();
        }
        if($("#claveuser").val() == ""){
          $('#validateContra').show();
        }
        else{
          $('#validateUser').show();
          $('#validateContra').show();
        }
      }

      $("#acceder").click(function (){
          signin();
      });

      // $("#acceder").click(signin());

    });
  </script>

</body>
</html>