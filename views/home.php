<?php 
$o_listCourse= new AdminCursoController();
$a_cursos= $o_listCourse->listaTodoslosCurso();
$a_cursos = json_decode( json_encode( $a_cursos ), true );

// print_r($a_cursos);die;
?>
  <section id="hero" class="d-flex align-items-center" >
    <div id="titlehome" class="container textHome" data-aos="zoom-out" data-aos-delay="100">
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
      #textBodyhome{
        height: 30%;
      }
    </style>

    <section class="section bg-primary" >
      <div class="container justify-content-center row-cards text-center textHome" >
          <div class="row" >
              <div class="col-lg-4 col-12" style="margin-top: 54px;"> 
                <span class="numberTitle font-weight-bolder">33</span>
                <p class="textTile"><h3 style="color:white">AÑOS DE EXPERIENCIA</h3></p>
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
    
    <section  id="listadoCursos" class="clearfix overflow-hidden section-active cuerpo textHome"  >
        <div class="container-demo justify-content-center row-cards text-cente"style="margin-top: 30px;" >
          
        <div class="position-relative row justify-content-center row-cards text-center" style="margin-left: 155px !important;margin-bottom: 138px;">
		  	<?php if(!empty($a_cursos)){?>
          <?php foreach($a_cursos as $curso){?>
            <div class="col-lg-4 col-12 mb-4">
            <div class="card" style="width: 20rem; height: 29rem; border-radius: 34px; ">
            <img class="card-img-top" style="width: 150px; height: 120px; margin: 0 auto;border-radius: 20px;padding-top: 5px;" src="<?php echo($curso['imgRuta']);?>" alt="Card image cap">
            <div class="card-body" style="margin-top: 20px;">
							<!-- <h2><?php echo($curso['rama']) ; ?></h2> -->
							<h3><?php echo($curso['nombre_curso']) ; ?></h3>
							<p style="text-align: justify">Descripcion:<?php echo($curso['descripcion']) ; ?></p>
							<p>Tiempo de duracion(H):<?php echo($curso['duracion_curso']) ; ?></p>
              <i style="font-size: 31PX;" class="fa-solid fa-info btnLinkCurso" title="Informacion" value="<?php echo($curso['id_curso']) ; ?>"  type="button"></i>
              <i style="font-size: 31PX;" class="fa-solid fa-cart-plus btnComprarCurso" title="Comprar" value="<?php echo($curso['id_curso']) ; ?>" type="button"></i>
              
							<!-- <a class="btnLinkCurso" value="<?php echo($curso['id_curso']) ; ?>"  type="button" class="btn btn-primary">Mas informacion</a>
              <a class="btnComprarCurso" value="<?php echo($curso['id_curso']) ; ?>"  type="button" class="btn btn-primary">Comprar</a> -->
					</div>
				</div>
            </div>
			  <?php }?> 
        <?php }?>
          

          </div>
        </div>
    </section>


    <section >     
        <div  id="bodyHome" class="container" data-spy="scroll" data-target="#navbar-example2">
                <div class="alert alert-info" role="alert">
                  <div id="titlleCurso">
                    <h1></h1> 
                        <i class="bi bi-person-circle"> Albert Ramírez </i> 
                    </div>  
                  </div>

              <nav id="navbar-example2" class="navbar navbar-expand-lg navbar-dark bg-info">              
              </nav>
              <div class="container row">
                <div data-offset="0">
                  <h4 id="Descripcion">Descripcion</h4>
                  <h4 id="Archivos">Archivos</h4>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora nemo atque, corrupti unde sunt inventore odit ullam ducimus expedita eius hic! Architecto earum inventore nihil tempore, odio nam perferendis tenetur?</p>
                  <div class="list-group">
                    <a href="https://static.platzi.com/media/public/uploads/slidesmongo-db_fcca3cd8-efc9-46bb-bf63-c82740833714.pdf" class="list-group-item list-group-item-action active" aria-current="true">
                      Slides Curso
                    </a>
                    <a href="https://www.mongodb.com/es/what-is-mongodb" class="list-group-item list-group-item-action">mongodb.com</a>
                    <a href="https://tutorialesenpdf.com/descarga/?file=MongoDB+en+espa%C3%B1ol+El+principio.pdf&hash=!bDRyBQzI!9mwFewtJgWX3zaY9FpNFnxN1GMdgxoyvwmZR70kbq4s" class="list-group-item list-group-item-action">Manual</a>
                  </div>
                  
                  <h4 id="Opiniones">Opiniones</h4>
                  <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora nemo atque, corrupti unde sunt inventore odit ullam ducimus expedita eius hic! Architecto earum inventore nihil tempore, odio nam perferendis tenetur?</p> 
                
                  <div class="card">
                    <div class="card-header" >
                    <div class="container">
                      <div class="row">
                        <div class="col- mr-1">
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col- mr-1">
                        <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col-  mr-1">
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col- mr-1">
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col-">
                          <i class="bi bi-star"></i>
                        </div>
                      </div>
                    </div>

                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Esta buenísimo! El segundo artículo me está ayudando a comprender las diferencias de cada DB muy bien.</p>
                        <footer class="blockquote-footer">Adriana Gomez Figueroa </footer>
                      </blockquote>
                    </div>
                  </div>
                
                  <div class="card">
                    <div class="card-header" >
                    <div class="container">
                      <div class="row">
                        <div class="col- mr-1">
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col- mr-1">
                        <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col-  mr-1">
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col- mr-1">
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col-">
                          <i class="bi bi-star"></i>
                        </div>
                      </div>
                    </div>

                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Que bueno que cambiaron de profesor, al otro como que se le iba el rollo</p>
                        <footer class="blockquote-footer">Demetrio Del Carmen Gómez </footer>
                      </blockquote>
                    </div>
                  </div>

                  <div class="card">
                    <div class="card-header" >
                    <div class="container">
                      <div class="row">
                        <div class="col- mr-1">
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col- mr-1">
                        <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col-  mr-1">
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col- mr-1">
                          <i class="bi bi-star-fill"></i>
                        </div>
                        <div class="col-">
                          <i class="bi bi-star"></i>
                        </div>
                      </div>
                    </div>

                    </div>
                    <div class="card-body">
                      <blockquote class="blockquote mb-0">
                        <p>Para complementar este curso pueden encontrar muchos otros en MongoDB University. Son gratuitos </p>
                        <footer class="blockquote-footer">Agustina Corvo </footer>
                      </blockquote>
                    </div>
                  </div>

                </div>
              </div>
        </div>
    </section>