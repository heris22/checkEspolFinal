<?php

include_once('facultadControlador.php');
include_once('facultadClase.php');

$tmpFacultad = new FacultadControlador();
$accion = $_GET['accion'];

//presenta las facultades en tipo json para ubicarlas en el grid
if ($accion == 1) {
    $facultades = $tmpFacultad->mostrarFacultadesJson();
    echo $facultades;
}

//guarda en la base una NUEVA facultad
if ($accion == 3) {
    $siglas = $_POST['siglas'];
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    
    $facultad = $tmpFacultad->guardarFacultad($siglas, $nombre, $imagen);
    echo "Facultad guardada con éxito";
}

//guarda la facultad EDITADA 
if ($accion == 4) {
    $id = $_POST['id'];
    $siglas = $_POST['siglas'];
    $nombre = $_POST['nombre'];
    $imagen = $_POST['imagen'];
    
    $facultad = $tmpFacultad->actualizarFacultad($id, $siglas, $nombre, $imagen);
    echo "Facultad actualizada con éxito";
}

//elimina la facultad
if ($accion == 5) {
    $id = $_POST['id'];
    $facultad = $tmpFacultad->eliminarFacultad($id);
    echo "Facultad eliminada con éxito";
}

?>
