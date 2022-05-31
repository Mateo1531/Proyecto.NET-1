<div class="container" style="margin-bottom: 290px">
    <div class="" style="text-align: center; font-weight: bold; margin-top: 60px;">
      <h3>Comparte tus conocimientos con los demas y obten ingreso por ello</h3>
    </div>
    <hr>
    <div class="row">
        <div class="panel panel-primary filterable">
            <div class="panel-heading">
                <button type="button" class="btn btn-primary" data-toggle="modal" id="btnModalCrearCurso" data-target="#modalCrearCurso" data-whatever="@getbootstrap">Crear curso</button>
            </div>
            <div class="text-right">
                <button class="btn btn-default btn-xs btn-filter bg-primary"  style="color: white;"><span class="glyphicon glyphicon-filter"></span> Filtrar</button>
            </div>
            <table id="tableCurso" class="table">
                <thead>
                    <tr class="filters">
                        <th><input type="text" class="form-control" placeholder="ID" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nombre del curso" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Descripcion" disabled></th>
                        <th><input type="text" class="form-control"  disabled></th>
                    </tr>
                </thead>
                <tbody >
                     
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
        <form id="formCurso" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Nombre del curso:</label>
            <input type="text" class="form-control" name="nombreCurso" id="nombreCurso">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Descripcion:</label>
            <textarea style="width: 86%;" class="form-control" name="descripcion" id="descripcion" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="recipient-name"  class="col-form-label">Eliga una categoria</label>
            <select class="form-control " style="width:86% !important;" id="idCategoria">
                
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

          <div class="mb-3" style="width: 86%;">
              <input type="file" id="imageFile" name="file" accept="image/*">
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary"  data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary" >Crear</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>