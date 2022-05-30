
<div class="container-fluid" style="width:100%;height:auto; padding: 0px !important;">
  <div class="row">
    <div class="col-sm container-fluid">
      <img class="card-img-top" style="width:100%;height: 65rem;" src="views/img/blackP.jpg" alt="Card image cap">
    </div>
    <div class="col-sm row  align-items-center">

      <div class="card mx-auto">
        <div id="formContent">
            <div class="fadeIn first title" >
              <img class="bg-primary" src="views/img/LOGO W-02.png"  id="icon" alt="User Icon" />
            </div>         
            <form>
              <div  id="incorrectLogin" style="width: 85%; margin: 0 auto;" class="alert alert-danger" role="alert">
                Su usuario o contraseña son incorrectos
              </div>
              <div  id="validateUser" style="width: 85%; margin: 0 auto;" class="alert alert-danger" role="alert">
                Tiene que ingresar su usuario
              </div>
              <input type="text" id="nomuser" class="fadeIn second" name="login" placeholder="usuario">
              <div  id="validateContra" style="width: 85%; margin: 0 auto;" class="alert alert-danger" role="alert">
                Tiene que ingresar su Contraseña
              </div>
              <input type="text" id="claveuser" class="fadeIn third" name="login" placeholder="contraseña">              
              <div class="col-md-12 btnSec">
                  <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" style="background-color: #f6f6f6;" href="#"><img style="margin: 2px 13px 3px 0px;  width:7%" src="views/img/logoGoogle.png">Continuar con Google</a>
              </div>
              <div class="col-md-12 btnSec">
                  <a class="btn btn-lg btn-google btn-block text-uppercase btn-outline" style="background-color: #f6f6f6;" href="#"><img style="margin: 2px 13px 3px 0px;  width:7%" src="views/img/logFb.png">Continuar con Facebook</a>
              </div>
              
            <input id="acceder"  class="fadeIn fourth btn btn-primary" value="Iniciar Sesión">
            </form>
            <div id="formFooter">
                <a class="underlineHover" href="#">Cambiar contraseña  /</a>
                <a class="underlineHover" href="home">Regresar a Home</a> 
            </div>
        </div>
      </div>
    </div>
  </div>
</div>
