<nav class="navbar navbar-expand-lg navbar-light bg-dark">
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
          <li class="nav-item active">
            <a class="nav-link text-white" href="home">Home</a>
          </li>
          <?php  if(!$_SESSION['acceso']){?>
              <li class="nav-item">
                <a class="nav-link text-white" href="login">Login</a>
              </li>
          <?php }?>
         
          <li class="nav-item">
            <a class="nav-link" href="#" data-target="#modal-change-pw" data-toggle="modal">Cambiar contraseña</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
              Opciones
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="adminCurso">Adminitracion de Cursos</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" type="button" id="btnLogout" >Cerrar Sesión</a>
            </div>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link disabled">User: <?= $_SESSION['nombre_completo']; ?></a> -->
          </li>
        </ul>
        
      </div>
</nav>