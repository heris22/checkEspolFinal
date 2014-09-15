<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    <body class="homepage">
        <?php include_once('comentarioComedorControlador.php');?> 
        <?php include_once('menuCentral.php');?> 

        <div class="wrapper">
            <div class="container">
                <div class="text-center">
                    <p><h2>COMEDORES EN ESPOL</h2></p>
                </div>
                <div class="row features">
                    <?php $facultad = new comentarioComedorControlador();
                    foreach ($facultad->mostrarComedores() as $m){
                        echo "<section class='4u feature'>";
                        echo "<div class='image-wrapper'>
                                <a class='image full' href='comedorinfo.php?c=". $m->getIdComedor() . "'>".
                                    "<img src='".$m->getImagen()."' alt='facultad' /></a>".
                            "</div>";
                        echo "<header>".
                                "<a class='button' href='comedorinfo.php?c=". $m->getIdComedor() . "'>". $m->getNombre() ."</a>".
                             "</header>";
                        echo "</section>";                  
                    }
                    ?> 
		</div>
            </div>
      </div> 
        <?php include_once('footer.php');?>   
    </body>
</html>
