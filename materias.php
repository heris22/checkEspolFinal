<!DOCTYPE HTML>
<html>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <?php include_once('metadatos.php');?>
    <body class="left-sidebar">
        <?php include_once('materiaControlador.php');?> 
        <?php include_once('menuCentral.php');?> 
        <?php 
        
        if(isset($_GET['carrera'])) {
            $facultad = $_GET['f'];
            $carrera = $_GET['carrera'];
            
        }
        ?> 
        
          <div class="wrapper">
            <div class="container">
                <div class="row" id="main">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="margin-bottom:10px">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <p class="fuenteSubtitulos">¿Qúe materia dicta?</p>
                                <a href="javascript:history.back()">atrás</a>
                                
                                <?php $materia = new MateriaControlador();
                                        echo "<ul class='list-group'>";
                                        foreach ($materia->mostrarMaterias($carrera) as $c){
                                            echo "<li class='list-group-item'>
                                                    <a href='profesoresMateria.php?f=". $facultad ."&c=".$carrera."&materia=" . $c->getIdMateria() . "'>" .$c->getNombreMateria() . "</a>";                                     
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
