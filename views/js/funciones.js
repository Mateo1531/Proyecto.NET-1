//Validar campos login

function resetUI(idModal){
    $(idModal)[0].reset();
}


function getCursoById(idCurso){
    console.log('sadsa');
    $.ajax({
        url: 'controllers/RouteIndexController',
        type: 'POST',
        dataType: "json",
        data: {
          op          : 'getCursoById',
          class       : 'AdminCursoController',
          id_curso    : idCurso
        },  
        success: function (curso){
          return curso;
        }
    });

}