<?php

include_once('DataBaseControlador.php');
include_once('usuarioClase.php');
include_once('comentarioComedorClase.php');
include_once('comedorClase.php');
class ComentarioComedorControlador extends DataBaseControlador 

/*
select * from( select yam_Materia.id as idMateria, yam_Materia.Descripcion as Materia, yam_Profesor.id as idProfesor, yam_Profesor.Descripcion as Profesor from yam_Materia join yam_Inter_Mat_Prof on yam_Materia.id = yam_Inter_Mat_Prof.idMateria join yam_Profesor on yam_Inter_Mat_Prof.idProfesor = yam_Profesor.id)x where x.Materia like '%Mate%'*/
{

  function mostrartodosComentarios() {
       $rows = self::$db->getRows("SELECT * FROM comentario");        
        $arrayComedor= array();
    
        foreach ($rows as $c){
          $comedorAuxiliar = new ComentarioComedor($c{'idcomentario'},$c{'descripcion'});
          array_push($arrayComedor, $comedorAuxiliar);
        }
        return $arrayComedor;       
        
    }

function eliminarComentario($id) {    
    $deleterow = self::$db->deleteRow("DELETE FROM prueba.comentario WHERE idcomentario= ?", array("{$id}"));
  }  

    function actualizarComentario($idComentario,$descripcion) {    
    $insertrow = self::$db->updateRow("UPDATE prueba.comentario SET comentario.descripcion = ?  WHERE comentario.idComentario = ? ", array( "{$descripcion}",$idComentario));
    }  

    function crearDescripcion($descripcion) {    
    $insertrow = self::$db->insertRow("INSERT INTO prueba.comentario (idcomentario, descripcion) VALUES (?, ?)", array(null, "{$descripcion}"));
    }  

    function mostrarComentario($id) {
    $row = self::$db->getRows("SELECT * FROM prueba.comentario where idcomentario= ? ", array("{$id}")); 
    $ObjDemo = new ComentarioComedor($row[0]{'idcomentario'},$row[0]{'descripcion'});
    return $ObjDemo;
    }

    function mostrarId($comentario) {
    $row = self::$db->getRows("SELECT * FROM prueba.comentario where descripcion= ? ", array("{$comentario}")); 
    $ObjDemo = new ComentarioComedor($row[0]{'idcomentario'},$row[0]{'descripcion'});
    $numero=$ObjDemo->getIdComentario();

    return $numero;
    }

	function mostrarComentariosComedores($id) {
/*
$a= ("SELECT * FROM (SELECT comedor.idcomedor as IDCOMEDOR, comedor.nombre as COMEDOR, comentario.idcomentario as IDCOMENTARIO, 
  comentario.descripcion as COMENTARIO FROM comedor JOIN comentariocomedor ON comedor.idcomedor = comentariocomedor.idcomedor 
  JOIN comentario ON comentariocomedor.idcomentario = comentario.idcomentario)x WHERE x.IDCOMEDOR =".$id."");*/


$a= ("SELECT * FROM (SELECT comedor.idcomedor as IDCOMEDOR, 
  comedor.nombre as NOMBRECOMEDOR, comentario.idcomentario as IDCOMENTARIO, comentario.descripcion as COMENTARIO
  FROM comedor 
  JOIN comentariocomedor ON comentariocomedor.idcomedor = comedor.idcomedor 
  JOIN comentario ON comentariocomedor.idcomentario = comentario.idcomentario)x WHERE x.IDCOMEDOR =".$id."");

    $rows = self::$db->getRows($a);        
		/*$rows = self::$db->getRows("SELECT * FROM clasedemo.comentario WHERE clasedemo.comentariocomedor.idcomedor= 1");*/        
    	$arrayComedor= array();
    
        foreach ($rows as $c){          
          $comedorAuxiliar = new ComentarioComedor($c{'IDCOMENTARIO'},$c{'COMENTARIO'});
          array_push($arrayComedor, $comedorAuxiliar);
        }
   		return $arrayComedor;       
	}

  function mostrarUsuarioComentariosComedores($id) {

$a= ("SELECT * FROM (SELECT registro.idusuario as IDUSUARIO, registro.nombre as NOMBRE, registro.apellido as APELLIDO,comedor.idcomedor as IDCOMEDOR, 
  comedor.nombre as NOMBRECOMEDOR, comentario.idcomentario as IDCOMENTARIO, comentario.descripcion as COMENTARIO
  FROM registro JOIN comentariocomedor ON registro.idusuario = comentariocomedor.idusuario 
  JOIN comedor ON comentariocomedor.idcomedor = comedor.idcomedor 
  JOIN comentario ON comentariocomedor.idcomentario = comentario.idcomentario)x WHERE x.IDCOMEDOR =".$id."");
 
    $rows = self::$db->getRows($a);        
    /*$rows = self::$db->getRows("SELECT * FROM clasedemo.comentario WHERE clasedemo.comentariocomedor.idcomedor= 1");*/        
      $arrayComedor= array();
    
        foreach ($rows as $c){          
          $comedorAuxiliar = new Usuario($c{'IDUSUARIO'},$c{'NOMBRE'},$c{'APELLIDO'},null,null);
          array_push($arrayComedor, $comedorAuxiliar);
        }
      return $arrayComedor;       
  }

  function agregarComentarioComedor($idusuario,$idcomedor,$descripcion){
    
    $this->crearDescripcion($descripcion);   
    $idcomentario=$this->mostrarId($descripcion);
    $insertrow = self::$db->insertRow("INSERT INTO prueba.comentariocomedor (idcomentariocomedor, idusuario,idcomedor,idcomentario) 
      VALUES (?, ?, ?, ?)", 
      array(null, "{$idusuario}","{$idcomedor}","{$idcomentario}"));
  }

 	function eliminarComentarioComedor($id) { 
    
    $this->eliminarComentario($id);      
    $deleterow = self::$db->deleteRow("DELETE FROM prueba.comentariocomedor WHERE idcomentario= ?", array("{$id}"));
  }  

  function mostrarComedores() {
    $rows = self::$db->getRows("SELECT * FROM comedor");        
      $arrayComedor= array();    
        foreach ($rows as $c){
          $comedorAuxiliar = new Comedor($c{'idcomedor'},$c{'nombre'},$c{'descripcion'},$c{'imagen'});
          array_push($arrayComedor, $comedorAuxiliar);
        }
      return $arrayComedor;       
  }

  function mostrarComedoresJson() {
        $rows = self::$db->getRows("SELECT * FROM comedor");        
        return json_encode($rows);       
    }

  function eliminarComedor($id) {    
    $deleterow = self::$db->deleteRow("DELETE FROM prueba.comedor WHERE idcomedor= ?", array("{$id}"));
  }  

  function actualizarComedor($idComedor,$nombre,$descripcion,$imagen) {    
    $insertrow = self::$db->updateRow("UPDATE prueba.comedor SET comedor.nombre = ?, comedor.descripcion = ?, comedor.imagen = ?  WHERE comedor.idcomedor = ? ", array( "{$nombre}","{$descripcion}", "{$imagen}",$idComedor));
    }  

    function crearComedor($nombre,$descripcion,$imagen) {    
    $insertrow = self::$db->insertRow("INSERT INTO prueba.comedor (idcomedor, nombre, descripcion,imagen) VALUES (?, ?, ?, ?)", array(null, "{$nombre}","{$descripcion}","{$imagen}"));
    }  

    function mostrarComedor($id) {
    $row = self::$db->getRows("SELECT * FROM comedor where idcomedor= ? ", array("{$id}")); 
    $ObjDemo = new Comedor($row[0]{'idcomedor'},$row[0]{'nombre'},$row[0]{'descripcion'},$row[0]{'imagen'});
    return $ObjDemo;
    }

    
	
}	

?>