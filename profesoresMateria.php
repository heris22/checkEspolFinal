<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    <body class="left-sidebar">
        <?php include_once('profesoresMateriaControlador.php');?> 
        <?php include_once('menuCentral.php');?> 
        <?php 
        
        if(isset($_GET['materia'])) {
            //facultad siglas
            $facultad = $_GET['f'];
            //carrera id
            $carrera = $_GET['c'];
            //materia id
            $materia = $_GET['materia'];      
        }
        ?> 
        
        <div class="wrapper">
            <div class="container">
                <div class="row" id="main">
                    <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="margin-bottom:10px">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <?php $profesor = new ProfesorMateriaControlador();
                                    $materiaSeleccionada = $profesor->consultarMateria($facultad,$carrera,$materia);
                                    $facultadActual = $profesor->consultarFacultad($facultad);
                                    echo "<p class='fuenteSubtitulos'>Profesores que dictan la materia $materiaSeleccionada en $facultadActual</p>";
                                    echo "<a href='javascript:history.back()'>atrás</a>";
                                    
                                    foreach ($profesor->mostrarProfesoresPorMateria($materia) as $c){
                                        echo "<div class='thumbnail'>
                                            <img class='resize2 pull-left' src='images/profesorCabeza.png' />                                
                                            <div class='caption'>

                                                <a href='profesores.php?p=" . $c->getIdProfesor() ."&m=".$materia."'>";
                                                    echo" <h5 style='margin-left:60px'>". $c->getNombreProfesor() ." ".$c->getApellidos()."</h5>
                                                </a>
                                            </div>
                                        </div>";
                                    }
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


