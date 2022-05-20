
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
<?php 

  include 'views/nav.php';
  if(isset($_GET['ruta'])){
    if($_GET['ruta']=='login' || ($_GET['ruta']=='registro-usuario')){
      include 'views/'.$_GET['ruta'].'.php';
    }
  }
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

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

    });
</script> 
</body>
</html>