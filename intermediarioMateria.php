<?php


include_once('materiaControlador.php');

$tmpMateria= new MateriaControlador();
$accion = $_GET['accion'];

//presenta las materias en tipo json para ubicarlas en el grid
if ($accion == 1) {
    $materia = $tmpMateria->mostrarMateriasJson();
    echo $materia;
}

//guarda en la base una NUEVA materia
if ($accion == 2) {
    $nombre = $_POST['nombre'];
    $facultad = $_POST['facultad'];
    $carrera = $_POST['carrera'];
    
    $materia = $tmpMateria->guardarMateria($nombre, $facultad, $carrera);
    echo "Materia guardada con éxito";
}

//guarda la materia EDITADA 
if ($accion == 3) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $facultad = $_POST['facultad'];
    $carrera = $_POST['carrera'];
    
    $materia = $tmpMateria->actualizarMateria($id, $nombre, $facultad, $carrera);
    echo "Materia actualizada con éxito";
}

//elimina la Materia
if ($accion == 4) {
    $id = $_POST['id'];
    $materia = $tmpMateria->eliminarMateria($id);
    echo "Materia eliminada con éxito";
}

?>
