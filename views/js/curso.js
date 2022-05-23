//Validar campos login
$(document).ready(function() {
  $("#succes").hide();
    $("#formCurso").submit(function( event ) {
        event.preventDefault();
        var data= $(this).serializeArray();
        data.unshift({'name':'op','value':'crearCurso'});
        console.log(data);
        $("#carga").show();
        $.ajax({
            url: 'controllers/curso.controller.php',
            type: 'GET',
            dataType: "json",
            data: data,
            success: function (result){
              if (result['code']=='succes'){
              } else {
                alert(result);
              }
            }
        });
    });


});