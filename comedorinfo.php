
<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    <body class="homepage">
        <?php include_once('menuCentral.php');?>         
        <?php
        include_once('comentarioComedorControlador.php'); 
        $comedorseleccionado= $_GET["c"]; 
        $usuario="2";      
        ?>
        <div class="wrapper">
            <div class="container">
                <div class="row">
                     <div class="col-lg-8 col-lg-offset-2">
                       <?php $comedor = new ComentarioComedorControlador ();
                        $retorno=$comedor->mostrarComedor($comedorseleccionado);

                        echo "<h3>".$retorno->getNombre()."</h3>";
                        echo "<a href='javascript:history.back()'>atrás</a>";
                        echo "<a href'#' class='image full'><img src='".$retorno->getImagen()."' alt='' /></a> ";
                        echo "<p>".$retorno->getDescripcion()."</p>";
                        ?>                         
                     </div>	
                </div>
            </div>
             <div class="container">
                <div class="row">
                   <div class="col-lg-12">
                    <div class="col-lg-8 col-lg-offset-2">
                        <h3 class="fuenteSubtitulos">COMENTARIOS GENERALES</h3>
                        <form role="form" id="formComentario">                   
                                                    
                                        <div class="form-group">                 
                                            <label>Comentario</label>                 
                                            <input type="test" class="form-control"  name="comentario"placeholder="Introduce tu comentario"> 
                                            <input type="test" value=<?php echo $usuario ?> class="hidden" name="idusuario">  
                                            <input type="test" value=<?php echo $comedorseleccionado ?> class="hidden" name="idcomedor">
                                                                                                        
                                        </div>
                                                                 
                                        <input  id="btnGuardarComentario" type="button" value="Submit">    
                                 </form>       
                        <?php

                       
                        $comi = new ComentarioComedorControlador ();
                       
                              foreach ($comi->mostrarComentariosComedores($comedorseleccionado) as $m){
                              echo "<table class='table table-bordered'>
                                            <tr>
                                            <td class'active'>
                                                <span>".$m->getComentario()."</span>
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
        
        <script>
        $( "#btnGuardarComentario" ).click(function() {
            var form = $("#formComentario").serialize();
                $.ajax({
                    url: "insertcomentario.php", 
                    type: "POST",
                    data: form,
                    success: function(data) {
                            alert(data);
                            location.reload();
                            
                        }
                    });
        });


        </script>
          <?php include_once('footer.php');?>         
    </body>
</html>
