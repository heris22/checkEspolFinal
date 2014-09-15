<?php

include_once('usuarioClase.php');
include('DataBaseControlador.php');
include('comentarioProfesorClase.php');
class ComentarioProfesorControlador extends DataBaseControlador 

/*
select * from( select yam_Materia.id as idMateria, yam_Materia.Descripcion as Materia, yam_Profesor.id as idProfesor, yam_Profesor.Descripcion as Profesor from yam_Materia join yam_Inter_Mat_Prof on yam_Materia.id = yam_Inter_Mat_Prof.idMateria join yam_Profesor on yam_Inter_Mat_Prof.idProfesor = yam_Profesor.id)x where x.Materia like '%Mate%'*/
{

  function mostrartodosComentarios() {
       $rows = self::$db->getRows("SELECT * FROM comentario");        
        $arrayComedor= array();
    
        foreach ($rows as $c){
          $comedorAuxiliar = new ComentarioProfesor($c{'idcomentario'},$c{'descripcion'});
          array_push($arrayComedor, $comedorAuxiliar);
        }
        return $arrayComedor;       
        
    }

function eliminarComentario($id) {    
    $deleterow = self::$db->deleteRow("DELETE FROM clasedemo.comentario WHERE idcomentario= ?", array("{$id}"));
  }  

    function actualizarComentario($idComentario,$descripcion) {    
    $insertrow = self::$db->updateRow("UPDATE clasedemo.comentario SET comentario.descripcion = ?  WHERE comentario.idcomentario = ? ", array( "{$descripcion}",$idComentario));
    }  

    function crearDescripcion($descripcion) {    
    $insertrow = self::$db->insertRow("INSERT INTO clasedemo.comentario (idcomentario,descripcion) VALUES (?, ?)", array(null, "{$descripcion}"));
    }  

    function mostrarComentario($id) {
    $row = self::$db->getRows("SELECT * FROM clasedemo.comentario where idcomentario= ? ", array("{$id}")); 
    $ObjDemo = new ComentarioProfesor($row[0]{'idcomentario'},$row[0]{'descripcion'});
    return $ObjDemo;
    }

    function mostrarId($comentario) {
    $row = self::$db->getRows("SELECT * FROM clasedemo.comentario where descripcion= ? ", array("{$comentario}")); 
    $ObjDemo = new ComentarioProfesor($row[0]{'idcomentario'},$row[0]{'descripcion'});
    $numero=$ObjDemo->getIdComentario();

    return $numero;
    }

	function mostrarComentariosProfesores($id) {
/*
$a= ("SELECT * FROM (SELECT comedor.idcomedor as IDCOMEDOR, comedor.nombre as COMEDOR, comentario.idcomentario as IDCOMENTARIO, 
  comentario.descripcion as COMENTARIO FROM comedor JOIN comentariocomedor ON comedor.idcomedor = comentariocomedor.idcomedor 
  JOIN comentario ON comentariocomedor.idcomentario = comentario.idcomentario)x WHERE x.IDCOMEDOR =".$id."");*/
$a= ("SELECT * FROM (SELECT registro.idusuario as IDUSUARIO, registro.nombre as NOMBRE, profesor.idprofesor as IDPROFESOR, profesor.nombres as NOMBREPROFESOR,
materia.idmateria as IDMATERIA, materia.nombre as NOMBREMATERIA, 
  comentario.idcomentario as IDCOMENTARIO, comentario.descripcion as COMENTARIO
  FROM registro JOIN comentarioprofesor ON registro.idusuario = comentarioprofesor.idusuario 
  JOIN profesor ON comentarioprofesor.idprofesor = profesor.idprofesor 
  JOIN comentario ON comentarioprofesor.idcomentario = comentario.idcomentario JOIN materia ON comentarioprofesor.idmateria = materia.idmateria)x 
WHERE x.IDPROFESOR =".$id."");


    $rows = self::$db->getRows($a);        
		/*$rows = self::$db->getRows("SELECT * FROM clasedemo.comentario WHERE clasedemo.comentariocomedor.idcomedor= 1");*/        
    	$arrayComedor= array();
    
        foreach ($rows as $c){          
          $comedorAuxiliar = new ComentarioProfesor($c{'IDCOMENTARIO'},$c{'COMENTARIO'});
          array_push($arrayComedor, $comedorAuxiliar);
        }
   		return $arrayComedor;       
	}

  function mostrarUsuarioComentariosProfesores($id) {

$a= ("SELECT * FROM (SELECT registro.idusuario as IDUSUARIO, registro.nombre as NOMBRE, registro.apellido as APELLIDO, 
  profesor.idprofesor as IDPROFESOR, profesor.nombres as NOMBREPROFESOR, materia.idmateria as IDMATERIA, materia.nombre as NOMBREMATERIA, 
  comentario.idcomentario as IDCOMENTARIO, comentario.descripcion as COMENTARIO
  FROM registro JOIN comentarioprofesor ON registro.idusuario = comentarioprofesor.idusuario 
  JOIN profesor ON comentarioprofesor.idprofesor = profesor.idprofesor 
  JOIN comentario ON comentarioprofesor.idcomentario = comentario.idcomentario JOIN materia ON comentarioprofesor.idmateria = materia.idmateria)x 
WHERE x.IDPROFESOR =".$id."");

    $rows = self::$db->getRows($a);        
    /*$rows = self::$db->getRows("SELECT * FROM clasedemo.comentario WHERE clasedemo.comentariocomedor.idcomedor= 1");*/        
      $arrayComedor= array();
    
        foreach ($rows as $c){          
          $comedorAuxiliar = new Usuario($c{'IDUSUARIO'},$c{'NOMBRE'},$c{'APELLIDO'},null,null);
          array_push($arrayComedor, $comedorAuxiliar);
        }
      return $arrayComedor;       
  }

  function agregarComentarioProfesor($idusuario,$idprofesor,$descripcion,$idmateria){    
    $this->crearDescripcion($descripcion);   
    $idcomentario=$this->mostrarId($descripcion);
    $insertrow = self::$db->insertRow("INSERT INTO clasedemo.comentarioprofesor (idcomentarioprofesor, idusuario,idprofesor,idcomentario, idmateria) 
      VALUES (?, ?, ?, ?, ?)", 
      array(null, "{$idusuario}","{$idprofesor}","{$idcomentario}","{$idmateria}"));
  }

 	function eliminarComentarioProfesor($id) {     
    $this->eliminarComentario($id);      
    $deleterow = self::$db->deleteRow("DELETE FROM clasedemo.comentarioprofesor WHERE idcomentario= ?", array("{$id}"));
  }  

	
}	

?>