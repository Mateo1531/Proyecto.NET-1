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
      <?php  if(!$_SESSION['acceso']){?>
        <li class="nav-item">
          <a class="nav-link text-white" href="login">Iniciar Sesión</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="registro-usuario">Registrarse</a>
        </li>
        <?php }?>
      <li class="nav-item">
      </li>
      <?php  if($_SESSION['acceso']){?>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
            Opciones
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="adminCurso">Adminitracion de Cursos</a>
            <a class="dropdown-item" href="#" data-target="#modal-change-pw" data-toggle="modal">Cambiar contraseña</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" type="button" id="btnLogout" >Cerrar Sesión</a>
          </div>
        </li>
      <?php }?>
      <li class="nav-item">
        <!-- <a class="nav-link disabled">User: <?= $_SESSION['nombre_completo']; ?></a> -->
      </li>
    </ul>
  </div>
</nav>

<!-- Modal cambiar contraseña -->
<div id="modal-change-pw" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Actualizar contraseña</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="form-update-pw">
          <div class="form-group">
            <label for="">Ingrese su antigua contraseña</label>
            <input type="password" id="clave1" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="">Ingrese su nueva contraseña</label>
            <input type="password" id="clave2" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="">Confirme su nueva contraseña</label>
            <input type="password" id="clave3" class="form-control form-control-sm">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm" type="button" id="update-pw">Actualizar</button>
        <button class="btn btn-secondary btn-sm" type="button" id="cancel-update" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>