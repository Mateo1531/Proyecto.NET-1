//Cambiar clave - Vaciar modal
$(document).ready(function (){
  //Limpiar modal
  function resetUI(){
    $("#modal-change-pw")[0].reset();
  }
  function changepw(){
    const clave1 = $("#clave1").val();
    const clave2 = $("#clave2").val();
    const clave3 = $("#clave3").val();
    //Campos vacios
    if(clave1 == "" || clave2 == "" || clave3 == ""){
      alert("Debe ingresar los datos para continuar");
    }
    //Contraseñas no coinciden
    else{
      if(clave2 != clave3){
        alert("Su nueva contraseña no coincide");
      }
      else{
        $.ajax({
          url: 'controllers/RouteIndexController',
          type: 'POST',
          data: {
            op      : 'changepassword',
            class   : 'UsuarioController',
            datatype: 'json',
            clave1  : clave1,
            clave2  : clave2
          },
          success: function(result){
            //trim = quitar espacios
            if(result == "successUpdate"){
              alert("Se actualizo la contraseña");
              funcion.resetUI('#form-update-pw');
              $("#modal-change-pw").modal("hide");
            }
            else{
              alert("La contraseña ingresada no es correcta");
              $("#clave1").focus();
            }
          }
        });
      }
    }
  }
  $("#update-pw").click(changepw);
  $("#cancel-update").click(resetUI);
});