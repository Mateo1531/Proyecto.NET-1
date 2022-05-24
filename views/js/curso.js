//Validar campos login
const funcion = require("./funciones").default;
$(document).ready(function() {
  $("#success").hide();
    $("#formCurso").submit(function( event ) {
        event.preventDefault();
        var data= $(this).serializeArray();
        data.unshift({'name':'op','value':'crearCurso'});
        console.log(data);
        $.ajax({
            url: 'controllers/curso.controller.php',
            type: 'GET',
            dataType: "json",
            data: data,
            success: function (result){
              if (result['code']=='success'){
                $("#success").show();
                $('#modalCrearCurso').modal('hide');
                funcion.resetUI('#modalCrearCurso');
              }if(result['code']=='noSession'){
                window.location.href = './index.php'
              }else {
                alert(result);
              }
            }
        });
    });


});