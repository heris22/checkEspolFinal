<?php session_start(); ?>
<!DOCTYPE HTML>

<html>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	   <?php include_once('metadatos.php');?>
<body>
       <?php include_once('menuCentral.php');?> 
       <?php include_once('clubControlador.php');?> 

        <div class="wrapper">
            <div class="container">                    
                <div class="row features">                     
                    <?php                    
                    $clubes = new clubControlador();                
                    foreach ($clubes->mostrarClubes() as $club){                  
                        echo"<section class='col-lg-4 col-md-4 col-sm-4 feature imageclub'>
                            <a href='#' class='marginImgClubs'>
                                <img src=".$club->getImagen()." class='img-responsive' alt='' />
                            </a>
                            <header>
                                <a class='button marginImgClubs' href='informacionClub.php?p=". $club->getIdClub() . "'>".$club->getNombreClub()."</a>
                            </header>
                            </section>";	                                             
                    }?>
                </div>
            </div>
        </div>
       <?php include_once('footer.php');?>
</body>

</html>