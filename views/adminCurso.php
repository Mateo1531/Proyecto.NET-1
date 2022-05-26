<?php 
$o_listCourse= new AdminCursoController();
$a_cursos= $o_listCourse->listarCurso();

$a_cursos = json_decode( json_encode( $a_cursos ), true );
// print_r($a_cursos);die;
?>

<div class="container-fluid" style="margin-top: 50px;" >
  <div class="row">
    <div class="col-sm container-fluid mx-auto" style="padding-left:42px ;">
	<iframe width="100%" height="120%" src="https://www.youtube-nocookie.com/embed/C_nuaualoto" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="col-sm row  align-items-center">
      	<div class="card mx-auto">
        <div id="formContent">  
			<div class="fadeIn first title">
				Hay tantas razones para empezar para compartir tus conocimientos
            </div>   
            <div class="container row" >
				<div class="col-lg-12">
					<img src="./views/img/value-prop-inspire-v3.jpg" alt="">
					<img src="./views/img/value-prop-teach-v3.jpg" alt="">
					<img src="./views/img/value-prop-get-rewarded-v3.jpg" alt="">
				</div>
				<div class="container">
						<div class="row">
							<div class="col-sm">
								Publica el curso que quieras, como quieras y ten siempre el control de tu propio contenido.
							</div>
							<div class="col-sm">
								Enseña lo que sabes y ayuda a los estudiantes a explorar sus intereses, adquirir nuevas habilidades y avanzar en sus carreras.
							</div>
							<div class="col-sm">
								Amplía tu red profesional, desarrolla tus conocimientos y gana dinero con cada inscripción de pago.
							</div>
						</div>
					</div>	
				</div>
        	</div>
      	</div>
		  <div class=" mx-auto" style="margin-top: 10px; position: relative;">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCrearCurso" data-whatever="@getbootstrap">Crear curso</button>
    		</div>
    </div>
  </div>
</div>

<div class="container-fluid">
  	<div class="row">
		<div class="col-sm row  align-items-center">
			
		</div>
		<div class="col-sm container-fluid">
			<div id="dialogCurso" class="container" >
					<div class="" style="text-align: center;">
						
					</div>
					
				</div>
			</div>
		</div>
	</div>
</div>

<div class="container">
    <hr>

    
    <hr>
    <p>Inspired by this <a href="http://bootsnipp.com/snippets/featured/panel-tables-with-filter">snippet</a></p>
    <div class="row">
        <div class="panel panel-primary filterable">
            
            <div class="text-right">
                <button class="btn btn-default btn-xs btn-filter"><span class="glyphicon glyphicon-filter"></span> Filter</button>
            </div>
            <table class="table">
                <thead>
                    <tr class="filters ">
                        <th><input type="text" class="form-control" placeholder="Id" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Nombre" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Descripcion" disabled></th>
                        <th><input type="text" class="form-control" placeholder="Duracion" disabled></th>
                        <th><input type="text" class="form-control"  disabled></th>
                    </tr>
                </thead>
                <tbody>
                <!-- echo "Key=" . $curso . ", Value=" . $a_cursos; -->
                     <?php foreach ($a_cursos as $curso) {?>
                        <tr>
                          <td><?php echo $curso['id_curso']; ?></td>
                          <td><?php echo $curso['nombre_curso']; ?></td>
                          <td><?php echo $curso['descripcion']; ?></td>
                          <td><?php echo $curso['nombre_curso']; ?></td>
                          <td>
                            <i id="<?php echo $curso['id_curso'];?>" type="button" name="editCuro" class="fas fa-edit"></i>
                            <i id="<?php echo $curso['id_curso'];?>" type="button" name="disabledCurso" class="fa-solid fa-power-off"></i>
                          </td> 
                          


                        </tr>   
                      <?php }?>
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