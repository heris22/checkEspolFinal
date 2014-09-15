<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    <body class="homepage">
        <?php include_once('facultadControlador.php');?> 
        <?php include_once('menuCentral.php');?> 

        <div class="wrapper">
            <div class="container">
                <div class="text-center">
                    <p><h2>Busca y comenta sobre tus profesores según tu facultad</h2></p>
                </div>
                <div class="row features">
                    <?php $facultad = new FacultadControlador();
                    foreach ($facultad->mostrarFacultades() as $m){
                        
                         echo"<section class='col-lg-4 col-md-4 col-sm-4 feature imageclub'>
                            <a class='marginImgClubs' href='carreras.php?f=". $m->getIdFacultad() . "'>
                                <img src=".$m->getImagen()." class='img-responsive' alt='' />
                            </a>
                            <header>
                                <a class='button marginImgClubs' href='carreras.php?f=".  $m->getIdFacultad() . "'>".$m->getSiglas()."</a>
                            </header>
                            </section>";             
                    }
                    ?> 
		</div>
            </div>
      </div> 
        <?php include_once('footer.php');?>   
    </body>
</html>
