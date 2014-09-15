<?php
$idusuario=$_POST["idusuario"];
$idprofesor=$_POST['idprofesor'];
$idmateria=$_POST['idmateria'];
$descripcion=$_POST['comentario'];




include_once("profesorControlador.php");

$UsuarioControladorObj = new ProfesorControlador();
$UsuarioControladorObj->agregarComentarioProfesor($idusuario,$idprofesor,$descripcion,$idmateria);
echo "Comentario insertado con éxito!"

?>

