<?php
include_once('profesorClase.php');
include_once('profesorControlador.php');
include_once('profesoresMateriaControlador.php');

$tmpProfesor= new ProfesorControlador();
$tmpProfesor2= new ProfesorMateriaControlador();
$accion = $_GET['accion'];

//presenta los profesores en tipo json para ubicarlas en el grid
if ($accion == 1) {
    $profesor = $tmpProfesor->mostrarProfesoresJson();
    echo $profesor;
}

//guarda en la base un NUEVO profesor
if ($accion == 2) {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tercernivel = $_POST['tercernivel'];
    $masterado = $_POST['masterado'];
    
    $profesor = $tmpProfesor->guardarProfesor($nombre, $apellido,$tercernivel,$masterado );
    echo "Profesor guardado con éxito";
}

//guarda el profesor EDITADO 
if ($accion == 3) {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $tercernivel = $_POST['tercernivel'];
    $masterado = $_POST['masterado'];
    
    $profesor = $tmpProfesor->actualizarProfesor($id, $nombre, $apellido,$tercernivel,$masterado);
    echo "Profesor guardado con éxito";
}

//elimina el profesor
if ($accion == 4) {
    $id = $_POST['id'];
    $profesor = $tmpProfesor->eliminarProfesor($id);
    echo "Profesor eliminado con éxito";
}

//busca las materias del profe
if ($accion == 5) {
    $id = $_GET['p'];
    $profesor = $tmpProfesor2->mostrarMateriasPorProfesor($id);
    return $profesor;
 
}

//agrega materia al profesor
if ($accion == 6) {
    $idProfesor = $_GET['p'];
    $idMateria = $_GET['m'];
    $profesor = $tmpProfesor2->agregarMateriaProfesor($idProfesor,$idMateria);
    echo "Materia agregada con éxito";
 
}

//quita materia al profesor
if ($accion == 7) {
    $idProfesor = $_GET['p'];
    $idMateria = $_GET['m'];
    $profesor = $tmpProfesor2->quitarMateriaProfesor($idProfesor,$idMateria);
}

//consultar profesor
if ($accion == 8) {
    $idProfesor = $_GET['p'];
    $profesor = $tmpProfesor2->consultarProfesor($idProfesor);
}

?>
