<!-- Modal cambiar contraseña -->
<div id="modal-change-pw" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="my-modal-title">Actualizar contraseña</h5>
        <button class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" id="form-update-pw">
          <div class="form-group">
            <label for="">Ingrese su antigua contraseña</label>
            <input type="password" id="clave1" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="">Ingrese su nueva contraseña</label>
            <input type="password" id="clave2" class="form-control form-control-sm">
          </div>
          <div class="form-group">
            <label for="">Confirme su nueva contraseña</label>
            <input type="password" id="clave3" class="form-control form-control-sm">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button class="btn btn-success btn-sm" type="button" id="update-pw">Actualizar</button>
        <button class="btn btn-secondary btn-sm" type="button" id="cancel-update" data-dismiss="modal">Cancelar</button>
      </div>
    </div>
  </div>
</div>