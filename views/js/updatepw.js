//Cambiar clave - Vaciar modal
const funcion = require("./funciones").default
$(document).ready(function (){
  //Limpiar modal
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
          url: 'controllers/usuario.controller.php',
          type: 'GET',
          data: {
            op: 'changepassword',
            clave1 : clave1,
            clave2 : clave2
          },
          success: function(result){
            //trim = quitar espacios
            if($.trim(result) == ""){
              alert("Se actualizo la contraseña");
              funcion.resetUI('#form-update-pw');
              $("#modal-change-pw").modal("hide");
            }
            else{
              alert(result);
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