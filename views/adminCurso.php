<div class="container">
    <h3>The columns titles are merged with the filters inputs thanks to the placeholders attributes</h3>
    <hr>
    <p>Inspired by this <a href="http://bootsnipp.com/snippets/featured/panel-tables-with-filter">snippet</a></p>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <h3 class="panel-title">Curso</h3>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearCurso" data-whatever="@getbootstrap">Crear curso</button>
            </div>
            <div class="text-right">
                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="#" disabled></th>
                        <th><input type="text" class="form-control" placeholder="First Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Last Name" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Username" disabled></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Jacob</td>
                        <td>Thornton</td>
                        <td>@fat</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Larry</td>
                        <td>the Bird</td>
                        <td>@twitter</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- imagen gif de carga -->
<img id="success" src="views/img/7efs.gif" alt="">
<!-- modal de creacion de curso -->
<div class="modal fade" id="modalCrearCurso" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formCurso">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del curso:</label>
            <input type="text" class="form-control" name="nombreCurso" id="nombreCurso">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Descripcion:</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Temario:</label>
            <input type="text" class="form-control" name="descripcion" id="temario">
          </div>
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label">Eliga una categoria</label>
            <select class="form-control " style="width:86% !important;" id="idCategoria">
                <option value="1">Python</option>
                <option value="2">Excel</option>
            </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Tiempo de duracion:</label>
            <input type="text" class="form-control" name="tiempoCurso" id="tiempoCurso">
          </div>
          <div class="form-group">
            <label for="recipient-name" style="margin-right: 6px;" class="col-form-label">Precio:</label>
            <input type="text" class="form-control" name="Precio" id="Precio">
          </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary"  data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" >Send message</button>
        </div>
        </form>
      </div>
    </div>
  </div>
</div>