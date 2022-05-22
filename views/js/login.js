//Validar campos login
$(document).ready(function() {
  $('#incorrectLogin').hide();
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
    //Usuario o contraseña incorrectas
    // if($("#nomuser").val() != "" || $("#claveuser").val() != "" ){
    //   $.ajax({
    //     url: 'controllers/usuario.controller.php',
    //     type: 'GET',
    //     data: {
    //       op          : 'login',
    //       username    : $("#nomuser").val(),
    //       contraseña  : $("#claveuser").val()
    //     },
    //     success: function (result){
    //       if ($.trim(result) == ""){
    //         //Ingresa al dashboard
    //         $('#incorrectUser').hide();
    //       } else {
    //         $('#incorrectUser').show();
    //       }
    //     }
    //   });
    // }
    //Campo usuario vacio
    if($("#nomuser").val() == ""){
      $('#validateUser').show();
    }
    else{
      $('#validateUser').hide();
    }
    //Campo contraseña vacio
    if($("#claveuser").val() == ""){
      $('#validateContra').show();
    }
    else{
      $('#validateContra').hide();
    }
    }
  $("#acceder").click(function (){
      signin();
  });
});