  <!-- Copyright -->
  <div id="footer-wrapper">
    <div id="copyright" class="container">
        <ul class="menu">
            <li>&copy; 2014 CheckESPOL. Todos los derechos reservados</li>
            <li>Términos y condiciones</li>
            <li><a href="desarrollo.php">Desarrolladores</a></li>
            
             <?php session_start();
             $usuario = $_SESSION['usuario'];
             if ($usuario == "Administrador") {
                  echo "<li><a href='administradorFacultades.php.'>Administración</a></li>";
             }
             ?>

        </ul>
    </div>
</div>