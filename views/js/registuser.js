$(document).ready(function() {
  $('#registerempty').hide();
  function register(){
    if($("#rnombres").val() != "" && $("#remail").val() != "" && $("#rclave").val() != "" && $("#rtelefono" != "")){
      $.ajax({
        url: 'controllers/RouteIndexController',
        type: 'POST',
        dataType: "json",
        data: {
          op          : 'reguser',
          class       : 'UsuarioController',
          name        : $("#rnombres").val(),
          email       : $("#remail").val(),
          phone       : $("#rtelefono").val(),
          password    : $("#rclave").val()
        },
        success: function (result){
          if (result == "successreg"){
            window.location.href = './index.php'
          }
        }
      });
    } else {
      $("#registerempty").show();
    }
  }
  $("#registrar").click(function (){
    register();
  });
});