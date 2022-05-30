<?php 
$o_listCourse= new AdminCursoController();
$a_cursos= $o_listCourse->listaTodoslosCurso();
$a_cursos = json_decode( json_encode( $a_cursos ), true );
// print_r($a_cursos);die;
?>
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>Bienvenidos a <span>MAFGAT</span></h1>
      <h2>Una web de cursos hecha a tu medida</h2>
      <div class="d-flex">
        <a href="#listadoCursos" class="btn-get-started scrollto">Ver cursos</a>
        <a href="https://www.youtube.com/watch?v=LAlceG2cY_w&list=PLM-Y_YQmMEqDcV8cJcosRsqJJNrhlpwzb" class="glightbox btn-watch-video"><i class="bi bi-play-circle"></i><span>Watch Video</span></a>
      </div>
    </div>
  </section>
    <style>

       .numberTitle{
        font-size:90px;
        font-family: 'Brandon Grotesque';
        color: white;
       }
       .textTile{
         color:white;
       }
    </style>

    <section class="section bg-primary" style="height: 30%;">
      <div class="container justify-content-center row-cards text-center" >
          <div class="row" >
              <div class="col-lg-4 col-12" style="margin-top: 54px;"> 
                <span class="numberTitle font-weight-bolder">33</span>
                <p class="textTile"><h2 style="color:white">AÑOS DE EXPERIENCIA</h3></p>
              </div>
              <div class="col-lg-4 col-12"  style="margin-top: 54px;">
                <span class="numberTitle font-weight-bolder">92%</span>
                <p class="textTile"><h3 style="color:white">ALUMNOS SATISFECHOS</h3></p>
              </div>
              <div class="col-lg-4 col-12" style="margin-top: 54px;">
                <span class="numberTitle font-weight-bolder">+200</span>
                <p class="textTile"><h3 style="color:white">MIL ALUMNOS GRADUADOS</h3></p>
              </div>
          </div>
      </div>
        
    </section>
    
    <section  id="listadoCursos" class="clearfix overflow-hidden section-active cuerpo"  >
        <div class="container-demo justify-content-center row-cards text-cente"style="margin-top: 30px;" >
          
          <div class="position-relative row justify-content-center row-cards text-center" style="margin-left: 155px !important;margin-bottom: 138px;">
		  	<?php if(!empty($a_cursos)){?>
          <?php foreach($a_cursos as $curso){?>
            <div class="col-lg-4 col-12 mb-4">
				<div class="card" style="width: 18rem;border-radius: 34px;">
					<img class="card-img-top" style="width: 150px; height: 120px; margin: 0 auto;border-radius: 20px;padding-top: 5px;" src="<?php echo($curso['imgRuta']);?>" alt="Card image cap">
					<div class="card-body">
							<!-- <h2><?php echo($curso['rama']) ; ?></h2> -->
							<h3><?php echo($curso['nombre_curso']) ; ?></h3>
							<p style="text-align: justify">Descripcion:<?php echo($curso['descripcion']) ; ?></p>
							<p>Tiempo de duracion(H):<?php echo($curso['duracion_curso']) ; ?></p>
							<a class="btnLinkCurso" value="<?php echo($curso['id_curso']) ; ?>"  type="button" class="btn btn-primary">Mas informacion</a>
					</div>
				</div>
            </div>
			  <?php }?> 
        <!-- <?php }else{?>
          
          <?php }?> -->

          </div>
        </div>
    </section>
