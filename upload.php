<?php
 
$accion = $_GET['accion'];
$nombre = $_FILES['archivo']['name'];
$nombre_tmp = $_FILES['archivo']['tmp_name'];

//imagenes de facultades
if ($accion ==1) {
     if( $_FILES['archivo']['error'] > 0 ){
      echo 'Error: ' . $_FILES['archivo']['error'] . '<br/>';
    }else{
        move_uploaded_file($nombre_tmp, "subidas/facultades/" . $nombre);
         echo true;
    }
}
  
if ($accion ==2) {
     if( $_FILES['archivo']['error'] > 0 ){
      echo 'Error: ' . $_FILES['archivo']['error'] . '<br/>';
    }else{
        move_uploaded_file($nombre_tmp, "subidas/usuario/" . $nombre);
         echo true;
    }
}   

if ($accion ==3) {
     if( $_FILES['archivo']['error'] > 0 ){
      echo 'Error: ' . $_FILES['archivo']['error'] . '<br/>';
    }else{
        move_uploaded_file($nombre_tmp, "subidas/clubs/" . $nombre);
         echo true;
    }
} 

if ($accion ==4) {
     if( $_FILES['archivo']['error'] > 0 ){
      echo 'Error: ' . $_FILES['archivo']['error'] . '<br/>';
    }else{
        move_uploaded_file($nombre_tmp, "subidas/comedores/" . $nombre);
         echo true;
    }
} 
