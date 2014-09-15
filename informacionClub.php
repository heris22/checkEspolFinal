<!DOCTYPE HTML>

<html>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	   <?php include_once('metadatos.php');?>
<body>
       <?php include_once('menuCentral.php');?> 
       <?php include_once('clubControlador.php');

         	 $clubSeleccionado = $_GET['p'];

         ?> 


        <div class="wrapper">

				<div class="container">
					<div class="row">
						<div class="col-lg-8 col-lg-offset-2">
					
							<!-- Content 
								<article id="content">
									
									<div class="row">
                                <div class="image-wrapper">
                                <a href="#" class="image full"><img src="images/taws1.png" alt="" /></a>
	                            </div>
	                            </div>-->
                           
                             <?php
		                            $club = new clubControlador();
		                            $clubDevuelto = $club->mostrarClub($clubSeleccionado);
		                            echo "<h2>Información</h2>";
		                            	echo"<p>".
		                            			$clubDevuelto->getInformacion()
		                            		."</p>";
		                            echo "<h2>Mision</h2>";
		                            	echo"<p>".
		                            			$clubDevuelto->getMision()
		                            		."</p>";
 									echo "<h2>Vision</h2>";
		                            	echo"<p>".
		                            			$clubDevuelto->getVision()
		                            		."</p>";
		                            echo "<h2>Contacto</h2>";
		                            	echo"<p>".
		                            			$clubDevuelto->getContacto()
		                            		."</p>";
		                            echo "<h2>Twitter</h2>";
		                            	echo"<p>".
		                            			$clubDevuelto->getTwitter()
		                            		."</p>";		                                       
		                            ?>									
								</article>

						</div>
					</div>
					
				</div>
			</div>
			 <?php include_once('footer.php');?>
</body>

</html>