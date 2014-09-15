<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    <body class="left-sidebar">
        <?php include_once('carreraControlador.php');?> 
        <?php include_once('menuCentral.php');?> 
        <?php 
        
        if(isset($_GET['f'])) {
            $facultad = $_GET['f'];
        }
        ?> 
        
        <div class="wrapper">
            <div class="container">
                <div class="row" id="main">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="margin-bottom:10px">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="fuenteSubtitulos">¿En qué carrera se encuentra el profesor que buscas?</p>
                                <a href="javascript:history.back()">atrás</a>
                                
                                <?php $carrera = new CarreraControlador();
                                        echo "<ul class='list-group' id='listaCarreras'>";
                                        foreach ($carrera->mostrarCarreras($facultad) as $c){
                                            echo "<li class='list-group-item'>
                                                    <a href='materias.php?f=". $facultad ."&carrera=" . $c->getIdCarrera() . "'>" .$c->getNombreCarrera() . "</a>";                                     
                                            echo "</li>";
                                        }
                                        echo "</ul>";
                                    ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      
       <?php include_once('footer.php');?>           
    </body>
    
    
</html>


