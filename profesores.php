<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    <body class="left-sidebar">
        <?php include_once('profesorControlador.php');?> 
        <?php include_once('menuCentral.php');?> 
        <?php 
        
        if(isset($_GET['p'])) {
            //profesor escogido
            $profesorelegido = $_GET['p'];  
            $materiaelegido = $_GET['m'];  
            $usuario = "1";
        }
        ?> 
        
          <div class="wrapper">
            <div class="container">
                <div class="row" id="main">
                    <div class="col-lg-8 col-lg-offset-2" style="margin-bottom:10px">                                       
                        <div class="row">                       
                            <div class="12u">                          
                                <a href="javascript:history.back()">atrás</a>
                                <?php
                                    $profesor= new profesorControlador();
                                    $objProfesor=$profesor->mostrarProfesor($profesorelegido);
                                 echo "<p class'fuenteSubtitulos'>".$objProfesor->getNombreProfesor()." ". $objProfesor->getApellidos().  "</p>                        
                                <br>                           
                                <div class='row'>                               
                                    <div class='4u'>                                   
                                        <img class='center-block' src='images/profesorCabeza.png' />                                    
                                        <p class='text-center'>Estrellas</p>                               
                                    </div>
                                <div class='8u'>
                                    <table class='table'>
                                        <tr>
                                            <td>Titulo Universitario:</td>
                                            <td>".$objProfesor->getTercerNivel()."</td>
                                        </tr>
                                        <tr>
                                            <td>Masterado:</td>
                                            <td>".$objProfesor->getMasterado()."</td>
                                        </tr>                                        
                                    </table>
                                </div>
                            </div>";
                                ?>                          
                               
                            <div class="row">
                                <div class="12u">
                                    <button type="button" class="btn btn-default pull-right" onclick=" window.location.href='formularioR.html' ">Escribir Reseña</button>
                                </div>
                            </div>
                            <div class="row table-responsive">
                                <div class="col-lg-12" >
                                    <h3 class="fuenteSubtitulos">COMENTARIOS DESTACADOS</h3>
                                    <?php

                                    ?>

                                 <form role="form" id="formComentario">                           
                                        <div class="form-group">                 
                                            <label >Comentario</label>                 
                                            <input type="test" class="form-control" id="ejemplo_email_1"  name="comentario"
                                                                    placeholder="Introduce tu comentario"> 
                                            <input type="test" value=<?php echo $usuario ?> class="hidden" name="idusuario">  
                                            <input type="test" value=<?php echo $profesorelegido ?> class="hidden" name="idprofesor">
                                            <input type="test" value=<?php echo $materiaelegido ?> class="hidden" name="idmateria">                                                             
                                        </div>
                                                                                                                 
                                                                                                               
                                        <input  id="btnGuardarComentario" type="button" value="Submit">    
                                 </form>       
                                    <?php

                                    foreach ($profesor->mostrarComentariosProfesoresMateria($profesorelegido,$materiaelegido) as $c) {
                                       echo "<table class='table table-bordered'>
                                            <tr>
                                            <td class'active'>
                                                <span>".$c->getA()."</span>
                                            </td>
                                            </tr>                                    
                                            </table>";
                                            }
                                    ?>
                                </div>
                                
                                
                            </div>
                            </div>
                        </div>
                    </div>
                </div>			 
            </div>	   
          </div>
   
      
       <?php include_once('footer.php');?>   
       <script type="text/javascript">

        $( "#btnGuardarComentario" ).click(function() {

            var form = $("#formComentario").serialize();

                $.ajax({
                    url: "insertcomentarioprofesor.php", 
                    type: "POST",
                    data: form,
                    success: function(data) {

                        
                            alert(data);
                            location.reload();
                            
                        }
                    });
        });


       </script>       
    </body>
    
    
</html>


