<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    <body class="homepage">
        <?php include_once('usuarioControlador.php');?> 
        <?php include_once('menuCentral.php');?> 
        
         <?php 

        if(isset($_GET['p'])) {
            $usuarioSeleccionado = $_GET['p'];
        }
        ?> 
       
	<!-- Features 1 -->
	<div class="wrapper">
            <div class="container">
                <div class="row">
                     <?php 
                                   $usuario = new UsuarioControlador();
                                   $user = $usuario->mostrarUsuario($usuarioSeleccionado);
                                   
                                    echo " <div class='col-lg-3 col-lg-offset-1'>  
                                      <div class='imagePerfil'>
                                             <img  class='img-responsive' src='". $user->getImagen()."' alt='facultad' /></a>
                                        </div>                

                                    </div>
                                         <div class='col-lg-8'>
                                            <div class='row'>
                                               <div class='col-lg-10'>

                                                    <table class='table table-bordered'>               
                                                                <tr>
                                                                <td class='active' style='width: 20%'>Nombres :</td><td>".$user->getNombre()."</td>
                                                                </tr>

                                                                <tr>
                                                                <td class='active' style='width: 30%' >Username :</td><td>".$user->getUsername()."</td>
                                                                </tr>
                                                                 <tr>
                                                                <td class='active' >Email :</td><td>".$user->getEmail()."</td>
                                                                </tr>

                                                               
                                                                                                     
                                                    </table> 

                                                </div>  
                                                </div>                 
                                         </div>"
                                       
                       
                                    ?>
                </div>  
                              
                  
                 <div class="row">
                    <div class="col-lg-10 col-lg-offset-1">
                        <button type="button" class="btn btn-default pull-right" onclick=" window.location.href='#' ">Cambiar Contraseña</button>
                     </div>  
                </div>   

                <div class="row">
                    <div class="col-lg-12" >
                         <div class="col-lg-10 col-lg-offset-1 ">
                                    <h3 class="fuenteSubtitulos">Últimos Comentarios</h3>
                                    <table class="table table-bordered">
                                    <tr>
                                    <td class="active">
                                        <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a fermentum elit, in luctus justo. Nunc ut sollicitudin felis, eu laoreet mi. Quisque cursus mattis quam, vitae porttitor nisl auctor ut. Pellentesque sapien lectus, luctus ut arcu ac, blandit porta libero. Integer semper velit vitae lectus laoreet, vel sagittis nisi fringilla.</span>
                                    </td>
                                    </tr>
                                    <tr>            
                                        <td class="active">                                    
                                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a fermentum elit, in luctus justo. Nunc ut sollicitudin felis, eu laoreet mi. Quisque cursus mattis quam, vitae porttitor nisl auctor ut. Pellentesque sapien lectus, luctus ut arcu ac, blandit porta libero. Integer semper velit vitae lectus laoreet, vel sagittis nisi fringilla.</span>                                  
                                        </td>           
                                    </tr>                                   
                                    <tr>                                
                                        <td class="active"> 
                                            <span>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi a fermentum elit, in luctus justo. Nunc ut sollicitudin felis, eu laoreet mi. Quisque cursus mattis quam, vitae porttitor nisl auctor ut. Pellentesque sapien lectus, luctus ut arcu ac, blandit porta libero. Integer semper velit vitae lectus laoreet, vel sagittis nisi fringilla.</span>                                            
                                        </td>                                                                                               
                                    </tr>
                                    </table>  
                                    <div class="12u">
                                        <button type="button" class="btn btn-default pull-right" onclick=" window.location.href='#' ">Ver mas</button>
                                    </div>  
                        </div>
                    </div>
                </div>
           
        </div>
         </div>
			
        <!-- Footer Wrapper -->
       
            
        <?php include_once('footer.php');?>         
       
    </body>
</html>

