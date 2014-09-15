<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    <body class="homepage">
        <?php include_once('menuCentral.php');?> 
         <?php include_once('profesorControlador.php');?> 

         <?php
        if(isset($_GET['letra'])) {
            $letra = $_GET['letra'];
        }
        ?>
	<!-- Features 1 -->
	<div class="wrapper">
                <div class="container">
                                    <div class="col-lg-8 col-lg-offset-2" style="margin-bottom:10px">                           
                                <div class="row">
                                    <div class="col-lg-11 col-lg-offset-1">
                                        <p class="fuenteSubtitulos">Lista de Profesores</p>
                                            <a href="javascript:history.back()">atrás</a>
                                         
                                                        <ul id="navlist">
                                                           <li><a href="buscarprofe.php?letra=a">A</a></li>
                                                           <li><a href="buscarprofe.php?letra=b">B</a></li>
                                                           <li><a href="buscarprofe.php?letra=c">C</a></li>
                                                           <li><a href="buscarprofe.php?letra=d">D</a></li>
                                                           <li><a href="buscarprofe.php?letra=e">E</a></li>
                                                           <li><a href="buscarprofe.php?letra=f">F</a></li>
                                                           <li><a href="buscarprofe.php?letra=g">G</a></li>
                                                           <li><a href="buscarprofe.php?letra=h">H</a></li>
                                                           <li><a href="buscarprofe.php?letra=i">I</a></li>
                                                           <li><a href="buscarprofe.php?letra=j">J</a></li>
                                                           <li><a href="buscarprofe.php?letra=k">K</a></li>
                                                           <li><a href="buscarprofe.php?letra=l">L</a></li>
                                                           <li><a href="buscarprofe.php?letra=m">M</a></li>
                                                           <li><a href="buscarprofe.php?letra=n">N</a></li>
                                                           <li><a href="buscarprofe.php?letra=o">O</a></li>
                                                           <li><a href="buscarprofe.php?letra=p">P</a></li>
                                                           <li><a href="buscarprofe.php?letra=q">Q</a></li>
                                                           <li><a href="buscarprofe.php?letra=r">R</a></li>
                                                           <li><a href="buscarprofe.php?letra=s">S</a></li>
                                                           <li><a href="buscarprofe.php?letra=t">T</a></li>
                                                           <li><a href="buscarprofe.php?letra=u">U</a></li>
                                                           <li><a href="buscarprofe.php?letra=v">V</a></li>
                                                           <li><a href="buscarprofe.php?letra=w">W</a></li>
                                                           <li><a href="buscarprofe.php?letra=x">X</a></li>
                                                           <li><a href="buscarprofe.php?letra=y">Y</a></li>
                                                           <li><a href="buscarprofe.php?letra=z">Z</a></li>
                                                        </ul>
                                    </div>  
                                
                            </div>
                                <div class="container">
                                    <div class="row">
                                        <div class="col-lg-8">

                                                <?php
                                                    $profesor = new profesorControlador();

                                        foreach ($profesor->consultarProfesorPorLetra($letra) as $profe){

                                            echo "<div class='thumbnail'>
                                                <img class='resize2 pull-left' src='images/profesorCabeza.png' />
                                                <div class='caption'>
                                                    <a href='resenia.html'><h5 style='margin-left:60px'>".$profe->getApellidos()."</h5></a>
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
        </div>
    </body>
</html>

