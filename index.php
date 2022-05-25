<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="./resouces/fontawesome/css/all.css">
  <link rel="stylesheet" href="./resouces/fontawesome/js/fontawesome.min.js">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
  <link rel="stylesheet" href="views/css/style.css">

</head>
<body>
<?php 
  require_once 'controllers/autoload.php';
  $autoload= new Autoload();
  $route= isset($_GET['ruta']) ? $_GET['ruta'] : 'home';
  $route= new RouteIndexController($route);
    



?>
<!-- Bootstrap -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>

<!-- Funciones -->
<!-- Agregar "../" a la ruta js para evitar conflictos -->
<script src="views/js/funciones.js"></script>
<script src="views/js/login.js"></script>
<script src="views/js/updatepw.js"></script>
<script src="views/js/curso.js"></script>
</body>
</html>

