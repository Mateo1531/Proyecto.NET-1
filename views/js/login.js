//Validar campos login
$(document).ready(function() {
  $('#incorrectLogin').hide();
  $('#validateUser').hide();
  $('#validateContra').hide();
  function signin(){
    if($("#nomuser").val() != "" && $("#claveuser").val() != ""){
      $.ajax({
        url: 'controllers/usuario.controller.php',
        type: 'POST',
        data: {
          op          : 'login',
          class      : 'UsuarioController',
          username    : $("#nomuser").val(),
          contraseña  : $("#claveuser").val()
        },
        success: function (result){
          if (result == "success"){
            //Ingresa al dashboard
            window.location.href = './index.php'
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
    //     successs: function (result){
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

    /* Script de buscador de tabla de admin. Curso*/
    $('.filterable .btn-filter').click(function(){
    var $panel = $(this).parents('.filterable'),
    $filters = $panel.find('.filters input'),
    $tbody = $panel.find('.table tbody');
    if ($filters.prop('disabled') == true) {
        $filters.prop('disabled', false);
        $filters.first().focus();
    } else {
        $filters.val('').prop('disabled', true);
        $tbody.find('.no-result').remove();
        $tbody.find('tr').show();
    }
    });

    $('.filterable .filters input').keyup(function(e){
    /* Ignore tab key */
    var code = e.keyCode || e.which;
    if (code == '9') return;
    /* Useful DOM data and selectors */
    var $input = $(this),
    inputContent = $input.val().toLowerCase(),
    $panel = $input.parents('.filterable'),
    column = $panel.find('.filters th').index($input.parents('th')),
    $table = $panel.find('.table'),
    $rows = $table.find('tbody tr');
    /* Dirtiest filter function ever ;) */
    var $filteredRows = $rows.filter(function(){
        var value = $(this).find('td').eq(column).text().toLowerCase();
        return value.indexOf(inputContent) === -1;
    });
    /* Clean previous no-result if exist */
    $table.find('tbody .no-result').remove();
    /* Show all rows, hide filtered ones (never do that outside of a demo ! xD) */
    $rows.show();
    $filteredRows.hide();
    /* Prepend no-result row if all rows are filtered */
    if ($filteredRows.length === $rows.length) {
        $table.find('tbody').prepend($('<tr class="no-result text-center"><td colspan="'+ $table.find('.filters th').length +'">No result found</td></tr>'));
    }
  });
});