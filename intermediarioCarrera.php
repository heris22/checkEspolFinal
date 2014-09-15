<?php
include_once('carreraClase.php');
include_once('carreraControlador.php');

$tmpCarrera= new CarreraControlador();
$accion = $_GET['accion'];

//presenta las carreras en tipo json para ubicarlas en el grid
if ($accion == 1) {
    $carrera = $tmpCarrera->mostrarCarrerasJson();
    echo $carrera;
}

//guarda en la base una NUEVA carrera
if ($accion == 2) {
    $nombre = $_POST['nombre'];
    $facultad = $_POST['facultad'];
    
    $carrera = $tmpCarrera->guardarCarrera($nombre, $facultad);
    echo "Carrera guardada con éxito";
}

//guarda la carrera EDITADA 
if ($accion == 3) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $facultad = $_POST['facultad'];
    
    $carrera = $tmpCarrera->actualizarCarrera($id, $nombre, $facultad);
    echo "Carrera actualizada con éxito";
}

//elimina la carrera
if ($accion == 4) {
    $id = $_POST['id'];
    $carrera = $tmpCarrera->eliminarCarrera($id);
    echo "Carrera eliminada con éxito";
}

//obtiene el json de las carreras tal como vienen de la base
if ($accion == 5) {
    $carrera = $tmpCarrera->mostrarCarrerasJsonSimple();
    echo $carrera;
}


?>
