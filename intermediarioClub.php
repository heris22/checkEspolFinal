<?php

include_once('clubControlador.php');
include_once('clubClase.php');

$tmpClub = new clubControlador();

$accion = $_GET['accion'];


//presenta las facultades en tipo json para ubicarlas en el grid
if ($accion == 1) {
    $club = $tmpClub->mostrarClubJson();
    echo $club;
}
//guarda en la base una NUEVA facultad
if ($accion == 3) {
    $nombre = $_POST['nombre'];
    $informacion = $_POST['informacion'];
    $mision = $_POST['mision'];
    $vision = $_POST['vision'];
    $contacto = $_POST['contacto'];
    $twitter = $_POST['twitter'];
    $imagen = $_POST['imagen'];
    
    $club = $tmpClub->guardarClub( $nombre ,$informacion ,$mision ,$vision ,$contacto ,$twitter ,  $imagen);
    echo "Club guardada con éxito";
}
//guarda la facultad EDITADA 
if ($accion == 4) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $informacion = $_POST['informacion'];
    $mision = $_POST['mision'];
    $vision = $_POST['vision'];
    $contacto = $_POST['contacto'];
    $twitter = $_POST['twitter'];
    $imagen = $_POST['imagen'];
    
    
    $club = $tmpClub->actualizarClub($id, $nombre ,$informacion ,$mision , $vision ,$contacto ,$twitter, $imagen);
    echo "Club actualizado con éxito";
}
//elimina la facultad
if ($accion == 5) {
    $id = $_POST['id'];
    $club = $tmpClub->eliminarClub($id);
    echo "Club eliminado con éxito";
}


?>

