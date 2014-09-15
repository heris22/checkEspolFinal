<?php

include_once('comedorControlador.php');
include_once('comedorClase.php');


$tmpComedor = new ComedorControlador();

$accion = $_GET['accion'];

//presenta las facultades en tipo json para ubicarlas en el grid
if ($accion == 1) {
    $comedor = $tmpComedor->mostrarComedoresJson();
    echo $comedor;
}
//presenta las carreras en tipo json para ubicarlas en el grid
if ($accion == 2) {
    $carrera = $tmpCarrera->mostrarCarrerasJson();
    echo $carrera;
}

//guarda en la base un NUEVO COMEDOR
if ($accion == 3) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];
    
    $comedor = $tmpComedor->crearComedor($nombre, $descripcion, $imagen);
    echo "Comedor guardado con éxito";
}

//guarda la facultad EDITADA 
if ($accion == 4) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $imagen = $_POST['imagen'];
       
    $comedor = $tmpComedor->actualizarComedor($id, $nombre, $descripcion, $imagen);
    echo "Comedor actualizado con éxito";
}

//elimina la facultad
if ($accion == 5) {
    $id = $_POST['id'];
    $comedor = $tmpComedor->eliminarComedor($id);
    echo "Comedor eliminada con éxito";
}

?>
