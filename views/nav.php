
<?php 
if($_SESSION['acceso']){
  $o_adminCurso= new AdminCursoController();
  $a_shoppingcart= $o_adminCurso->listShoppingcart();
  $a_shoppingcart=json_decode( json_encode( $a_shoppingcart ), true );
  $count=0;
  $amount=0;
  
  // var_dump($a_shoppingcart);die;
}


?>

<nav class="navbar navbar-expand-lg navbar-lightk bg-primary" style="height: 8%;">
      <a class="navbar-brand" href="home"><img src="views/img/LOGO W-02.png" style="width: 40%" alt=""></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <form class="form-inline my-2 my-lg-0">
          <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      <div class="collapse navbar-collapse " id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <?php  if(!$_SESSION['acceso']){?>
            <li class="nav-item"  style="margin: 0px 40px 0px 0px;">
                  <a class="nav-link text-white" href="login" style="font-size: 20;">Se un profesor</a>
            </li>
            <li class="nav-item"  style="margin: 0px 40px 0px 0px;">
                  <a class="nav-link text-white" href="registro-usuario"  style="font-size: 20;">Registrarse</a>
            </li>   
          <?php }?>
          
          <li class="nav-item dropdown">
            <a class="nav-link  text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
              <img src="views/img/icoSale.png" style="width:30%;" alt="">
            </a>
            <div id="carSale" class="dropdown-menu" aria-labelledby="navbarDropdown" style="left: -301px; width: 380px;">
            <div id="container-card">
                  <?php if($_SESSION['acceso']){?>
                    <?php if(empty($a_shoppingcart)){?>
                      <?php foreach($a_shoppingcart as $shoppingcart){ ?>
                        <a class='dropdown-item' style='display: block;float: left;width: 69%;' href='adminCurso'><?php echo($a_shoppingcart[$count]['nombre_curso']); ?></a>
                        <span type="button" style='display: block;float: right;margin-right: 17px;margin-top: 6px;'><i class="fa-solid fa-x"></i></span>
                        <span style='display: block;float: right;margin-right: 17px;'>$<?php echo($a_shoppingcart[$count]['precio_curso']);?></span>                    
 
                         
                       
                        <?php if($amount==0){?>
                        <?php  $amount=$amount + intval($a_shoppingcart[$count]['precio_curso']); }?>
                          <button>PAGAR</button>
                      <?php $count++;}?> 
                    <?php }?>
                      <a id="msgCardVacio" class='dropdown-item' href='' style="text-align: center;">Su carrito de compra esta vacio</a>
                      <!-- <a class='dropdown-item' style='display: block;float: left;width: 69%;' href='adminCurso'><?php echo($amount); ?></a> -->
                  <?php }else{?>
                  <?php }?>
                  </div>
            </div>
            <!-- echo $a_shoppingcart[0]['nombre_curso'] -->
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link  text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
              <img src="views/img/INICIO SESION-03.png" style="width:30%;" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="margin-left: -109px;">
              <?php  if(!$_SESSION['acceso']){?>
                  <a class="dropdown-item" href="login">Login</a>
              <?php } else{?>
                <a class="dropdown-item" href="adminCurso">Adminitracion de Cursos</a>
                <a class="dropdown-item" href="#">Cambiar contraseña</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" type="button" id="btnLogout" >Cerrar Sesión</a>
              <?php }?>

            </div>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link disabled">User: <?= $_SESSION['nombre_completo']; ?></a> -->
          </li>
        </ul>
        
      </div>
</nav>



<div class="modalAlert" id="msgAlert" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button id="btnClose" type="button" class="btn btn-secondary" data-dismiss="modalAlert">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
