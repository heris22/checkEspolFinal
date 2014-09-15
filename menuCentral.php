<?php session_start();
if(isset($_SESSION["usuario"])){
    $nombreUsuario = $_SESSION['usuario'];
    $idUsuario = $_SESSION['idusuario'];
}
else{
$_SESSION['usuario'] = "Invitado";  
$_SESSION['idusuario'] = "1"; 
                                 
$nombreUsuario = $_SESSION['usuario'];
$idUsuario = $_SESSION['idusuario'];
}
?>



<!-- Header Wrapper -->
	<div class="container-fluid" style="background: #444;">
            <div class="container">
		<div class="row">
                    <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12"> 
                        <!-- Logo -->
                            <h1 id="logo"><a href="index.php">CHECK ESPOL</a></h1>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                        <div class="input-group">
                            <form action="buscadorformu.php" method="get">                              
                                <div class="input-group-btn">
                                     <input type="text" class="form-control" placeholder="Busca a tu profe..." name="busqueda">
                                     <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                                </div>
                            </form>
                        </div>
                         <div>
                        
                            <h1 style="color: white; text-align: center">BIENVENIDO <?php echo $nombreUsuario; ?> </h1>
                            <div style="text-align: center">
                               <?php
                               echo "<a style='color: white; padding-right: 20px;' href='perfil.php?p=".$idUsuario."'>Mi Perfil</a>";
                              ?>
                             <a style="color: white; text-align: right" href="logout.php">Cerrar Sesión</a> 
                            </div>
                              
                    </div>
                    </div>
                   
                </div>	
	    </div>								
        </div>
			
    <div id="header-wrapper">	
    <!-- Header -->
	<div id="header" class="container">      
            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li class="button"><a href="clubes.php">Clubs</a></li>
                    <li class="button"> <a href="facultades.php">Facultades</a></li>
                    <li class="button"><a href="comedor.php">Comedores</a></li>
                    <li class="button"><a href="inisesion.php">Iniciar Sesión</a></li>
                </ul>								
            </nav>
	</div>
    </div>