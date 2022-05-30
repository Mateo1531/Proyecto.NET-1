//Validar campos login
$(document).ready(function() {

    var url_getUltimoCurso="getUltimoCurso";
    var url_listarMisCursos="listarMisCursos";
  // listar Curso
    $("#success").hide();
    $("#listCurso").hide();
    $("#msgAlert").hide();

    getCursos(url_listarMisCursos);
    $('#btnModalCrearCurso').click(function (){
        listCategoria();
    });
    $("#formCurso").submit(function( event ) {
        event.preventDefault();
        // $ ('#imageFile') . ecuación ( 0 ) [ 0 ]  ;
        // var frm=$('#formCurso')[0]
        var f = $(this);
        var formData = new FormData(document.getElementById("formCurso"));
        formData.append("class", "AdminCursoController");
        formData.append("op", "crearCurso");
        console.log(formData);
        // var file= new FormData(frm);
        // var data= $(this).serializeArray();
        // var fil1e=$('#imageFile').val();
        // console.log(file);
        // data.unshift({'name':'op','value':'crearCurso'},{name:'class',value:'AdminCursoController'},{name:'file',value:file});
        $.ajax({
            url: 'controllers/RouteIndexController',
            type: 'POST',
            cache: false,
            contentType: false,
	        processData: false,
            // contentType: false,
            dataType: "json",
            data: formData,
            success: function (result){
                $('#modalCrearCurso').modal('hide');
                var modal= $('#formCurso');
                resetUI(modal);
                if (result=='success'){
                    getCursos(url_getUltimoCurso);
                }else{
                    // window.location.href = './index.php';
                }
            }
        });
    });
    function getCursos(url){
        $.ajax({
          url: 'controllers/RouteIndexController',
          type: 'POST',
          dataType: "json",
          data: {
            op          : url,
            class       : 'AdminCursoController',
          },
          success: function (cursos){
              console.log('cursos');
              for (var curso in cursos){
                console.log(curso);
                $("#tableCurso>tbody").append(
                    "<tr><td>"+cursos[curso]['id_curso']+
                    "</td><td>"+cursos[curso]['nombre_curso']+
                    "</td><td>"+cursos[curso]['descripcion']+
                    "</td><td>"+cursos[curso]['duracion_curso']+
                    "</td><td><i type='button' name='"+cursos[curso]['id_curso']+"' class='fas fa-edit'></i>"+
                    "<i  type= 'button' name='"+cursos[curso]['id_curso']+"' class='fa-solid fa-power-off'></i></td></tr>"             
                );
                }
          }
        });
    }
    function listCategoria(){
        $.ajax({
            url: 'controllers/RouteIndexController',
            type: 'POST',
            dataType: "json",
            data: {
              op          : 'getListcategoria',
              class       : 'AdminCursoController',
            },
            success: function (categorias){
                console.log('cursos');
                for (var categoria in categorias){
                  $("#formCurso>div>select").append(
                     "<option value='"+categorias[categoria]['id_categoria']+"'>"+categorias[categoria]['rama']+"</option>"
                  );
                  }
            }
          });
    }
    $(".btnLinkCurso").click(function(){
        var id=$(this).attr('value');
        console.log(id);
        $.ajax({
            url: 'controllers/RouteIndexController',
            type: 'POST',
            dataType: "json",
            data: {
              op          : 'getCursoById',
              class       : 'AdminCursoController',
              id_curso    : id
            },  
            success: function (curso){
                  $("#titlleCurso>h1>i").append(
                     "<i class='bi bi-slack'>"+curso['nombre_curso'] +"</i>"
                  );
                  $("#Descripcion").append(
                    "<p>¡Bienvenidas y Bienvenidos al Curso de "+curso['nombre_curso']+"!</p>"+
                    "<p>"+curso['descripcion']+"</p>"
                 );
            }
        });
    });

    $('button[name=editCuro]').val();

    // function recargar(){
    //   $(this).live("click", function (evento)
    //   {
    //   var id = $(this).attr("id");
    //   alert(id);
    //   });
    //   }
});