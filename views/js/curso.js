//Validar campos login
var a_sale= [];
var price=0;
var url_getUltimoCurso="getUltimoCurso";
var url_listarMisCursos="listarMisCursos";
$(document).ready(function() {
  getCursos(url_listarMisCursos);
  // Script para mostrar menus al posicionarse encima del nav
  if (window.innerWidth > 992) {
    
      document.querySelectorAll('.navbar .navbar-nav').forEach(function(everyitem){

          everyitem.addEventListener('mouseover', function(e){

              let el_link = this.querySelector('a[data-bs-toggle]');

              if(el_link != null){
                  let nextEl = el_link.nextElementSibling;
                  el_link.classList.add('show');
                  nextEl.classList.add('show');
              }

          });
          everyitem.addEventListener('mouseleave', function(e){
              let el_link = this.querySelector('a[data-bs-toggle]');

              if(el_link != null){
                  let nextEl = el_link.nextElementSibling;
                  el_link.classList.remove('show');
                  nextEl.classList.remove('show');
              }


          })
      });

  }

    $("#success").hide();
    $("#listCurso").hide();
    $("#msgAlert").hide();
    $("#bodyHome").hide();
    
    $('#btnModalCrearCurso').click(function (){
        listCategoria();
    });
    $("#formCurso").submit(function( event ) {
        event.preventDefault();
        var f = $(this);
        var formData = new FormData(document.getElementById("formCurso"));
        formData.append("class", "AdminCursoController");
        formData.append("op", "crearCurso");
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
                    Swal.fire(
                      'Good job!',
                      'Se creo el curso correctamente',
                      'success'
                    )
                    resetUI('#formCurso');
                    getCursos(url_getUltimoCurso);
                }else{
                    // window.location.href = './index.php';
                }
            }
        });
    });
    function getCursos(url){
      console.log('entro')
        $.ajax({
          url: 'controllers/RouteIndexController',
          type: 'POST',
          dataType: "json",
          data: {
            op          : url,
            class       : 'AdminCursoController',
          },
          success: function (cursos){
              console.log(cursos);
              for (var curso in cursos){
                console.log(cursos)
                $("#tableCurso>tbody").append(
                    "<tr><td>"+cursos[curso]['id_curso']+
                    "</td><td>"+cursos[curso]['nombre_curso']+
                    "</td><td>"+cursos[curso]['descripcion']+
                    "</td><td>"+cursos[curso]['duracion_curso']+
                    "</td><td><i  type='button' name='"+cursos[curso]['id_curso']+"' class='fas fa-edit btnEditCurso'></i>"+
                    "<i type= 'button' name='"+cursos[curso]['id_curso']+"' class='fa-solid fa-power-off btnDesactivarCurso'></i></td></tr>"             
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
              console.log(curso)
                $('.textHome').hide();
                // $('#bodyHome').hide();
                // $('#titlehome').hide();
                $('#hero').attr('id','prueba');
                $('#textBodyhome').attr('id','prueba2');
                $('#titlehome').hide();
                $('#bodyHome').show();
                $("#titlleCurso>h1").append(
                  "<div class=<h1><i class='bi bi-slack'>"+curso[0]['nombre_curso']+"</i></h1>"
                );
                $("#navbar-example2").append(
                  "<a class='navbar-brand' href='#'>Qué aprenderás sobre "+curso[0]['nombre_curso']+"</a>"+
                  " <ul class='nav nav-pills'>"+
                  "<li class='nav-item'><a class='nav-link' href='#Decripcion'>Descripcion</a></li>"+
                  "<li class='nav-item'><a class='nav-link' href='#Archivos'>Archivos</a></</li>"
                );
                $("#Descripcion").append(
                  "<p>"+curso[0]['descripcion']+"</p>"
                );  
            }
        });
    });



    $('.btnComprarCurso').click(function(){
        var idCurso= $(this).attr('value');
        addSale(idCurso);
        $(this).attr('title','Pagar');
        $('#msgCardVacio').hide();
    })

    $('.btnEditCurso').click(function(){

      var id=$(this).attr('value')
        $.ajax({
          url: 'controllers/RouteIndexController',
          type: 'POST',
          dataType: "json",
          data: {
            op          : 'editCurso',
            class       : 'AdminCursoController',
            id_curso    :  id
          },
          success: function (response){
              console.log(response);

          }
        });
    });
    $('.btnDesactivarCurso').click(function(){
        $.ajax({
          url: 'controllers/RouteIndexController',
          type: 'POST',
          dataType: "json",
          data: {
            op          : 'desactivarCurso',
            class       : 'AdminCursoController',
          },
          success: function (response){
              console.log(response);

          }
        });
    });



    function getCursoById(idCurso){
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
            console.log(curso)
            $("#container-card").append(
              "<a class='dropdown-item' style='display: block;float: left;width: 79%;' href='adminCurso'>"+curso[0]['nombre_curso']+"</a>"+"<span style='display: block;float: right;margin-right: 17px;'>$"+curso[0]['precio_curso']+"</span>"
            );
            if(price==0){
              $("#carSale").append(
                "<div class='dropdown-divider'></div>"+
                "<a class='dropdown-item' style='display: block;float: left;width: 79%;' href='adminCurso'><b>MONTO:</b></a>"+"<span id='amountCard' style='display: block;float: right;margin-right: 17px;'><b>$"+curso[0]['precio_curso']+"</b></span>"+
                "<button type='button' href='login'>PAGAR</button>"
              );
              price=price+parseInt(curso[0]['precio_curso']);
            }else{
              price=price+parseInt(curso[0]['precio_curso']);
              $('#amountCard').val(price)
              $('#amountCard').text(price)
            }
          }
      });
    }


    function addSale(idCurso){
      curso= getCursoById(idCurso);
      $.ajax({
        url: 'controllers/RouteIndexController',
        type: 'POST',
        dataType: "json",
        data: {
          op          : 'shoppingCart',
          class       : 'AdminCursoController',
          id_curso    : idCurso
        },  
        success: function (response){
            if(response=="noSession"){
                var id =(idCurso)
                if(a_sale.length==0){
                  a_sale=[(id)];
                }
                if($.inArray(idCurso, a_sale)==-1){        
                  a_sale.push(id)
                }; 
                getCursoById(curso);
              }
            
        }
      });
    }

    // function recargar(){
    //   $(this).live("click", function (evento)
    //   {
    //   var id = $(this).attr("id");
    //   alert(id);
    //   });
    //   }
});