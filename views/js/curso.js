//Validar campos login
$(document).ready(function() {
    $("#formCurso").submit(function( event ) {
        event.preventDefault();
        var data= $('#formCurso').serialize();

        $.ajax({
            url: 'controllers/curso.controller.php',
            type: 'GET',
            data: data,
            success: function (result){
              if ($.trim(result) == ""){
                //Ingresa al dashboard
                window.location.href = 'views/'
              } else {
                alert(result);
              }
            }
        });
    });


});