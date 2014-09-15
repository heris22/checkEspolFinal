<?php
$idusuario=$_POST["idusuario"];
$idcomedor=$_POST['idcomedor'];
$descripcion=$_POST['comentario'];




include_once("comentarioComedorControlador.php");

$UsuarioControladorObj = new ComentarioComedorControlador();
$UsuarioControladorObj->agregarComentarioComedor($idusuario,$idcomedor,$descripcion);

echo "Comentario ingresado con éxito";
?>

