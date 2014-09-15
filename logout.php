<?php 
 //Crear sesi�n
 session_start();
  $_SESSION['usuario'] = "Invitado";
  $_SESSION['idusuario'] = "1";
 //Redireccionar a login.php
 header("location: inisesion.php");
?>