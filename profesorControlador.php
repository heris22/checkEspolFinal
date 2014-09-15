<?php
include_once('databaseControlador.php');
include_once('profesorClase.php');
include_once('comentarioProfesorClase.php');

class ProfesorControlador extends DataBaseControlador
{
    
	function consultarProfesorPorLetra($letra){
        $rows = self::$db->getRows("SELECT * FROM profesor WHERE apellidos LIKE '" . $letra . "%' ORDER BY apellidos");
        
         $arrayProfesores= array();

            foreach ($rows as $c){
              $profesorAuxiliar = new Profesor($c{'idprofesor'},$c{'nombres'},$c{'apellidos'},$c{'tercernivel'},$c{'masterado'});
              array_push($arrayProfesores, $profesorAuxiliar);
            }
            return $arrayProfesores;          
        }
        
        function guardarProfesor($nombre, $apellido, $tercernivel, $masterado) {
            $rows = self::$db->insertRow("INSERT INTO profesor VALUES(?,?,?,?,?)", array(null,"{$nombre}","{$apellido}", "{$tercernivel}", "{$masterado}"));
          }

          function actualizarProfesor($id, $nombre, $facultad) {
              $row = self::$db->updateRow("UPDATE profesor SET nombres = ?, apellidos = ?, tercernivel = ?, masterado = ? WHERE idcarrera = ? ", array( "{$nombre}", "{$facultad}", "{$id}"));
          }

          function eliminarProfesor($id) {    
              $row = self::$db->deleteRow("DELETE FROM profesor WHERE idprofesor= ?", array("{$id}"));
        }  


function consultarProfesorPorApellido($busqueda){
        $rows = self::$db->getRows("SELECT * FROM profesor WHERE apellidos LIKE '%".$busqueda."%'");
         $arraybusqueda= array();
            foreach ($rows as $c){
              $busquedaAuxiliar = new Profesor($c{'idprofesor'},$c{'nombres'},$c{'apellidos'},$c{'tercernivel'},$c{'masterado'});
              array_push($arraybusqueda, $busquedaAuxiliar);
            }
        return $arraybusqueda;          
}
  function mostrarProfesores() {
    $rows = self::$db->getRows("SELECT * FROM profesor ");        
    $arrayProfe= array();        
    foreach ($rows as $c){
      $aux = new Profesor($c{'idprofesor'},$c{'nombres'},$c{'apellidos'},$c{'tercernivel'},$c{'masterado'});
      array_push($arrayProfe, $aux);
    }
    return $arrayProfe;        
  }

    function mostrarProfesor($id) {
        $row = self::$db->getRows("SELECT * FROM profesor where idprofesor= ? ", array("{$id}")); 
        $ObjDemo = new Profesor($row[0]{'idprofesor'},$row[0]{'nombres'},$row[0]{'apellidos'},$row[0]{'tercernivel'},$row[0]{'masterado'});
        return $ObjDemo;
    }

     function mostrarProfesoresJson() {
        $rows = self::$db->getRows("SELECT idprofesor, CONCAT(nombres,' ',apellidos) AS nombrecompleto, nombres, apellidos, tercernivel, masterado FROM profesor");        
        return json_encode($rows);       
    }

    //FUNCIONES COMENTARIOS//////////////////////////////////////////////////////////////////////////////////////////////////////////////////



function eliminarComentario($id) {    
    $deleterow = self::$db->deleteRow("DELETE FROM prueba.comentario WHERE idcomentario= ?", array("{$id}"));
  }  

    function actualizarComentario($idComentario,$descripcion) {    
    $insertrow = self::$db->updateRow("UPDATE prueba.comentario SET comentario.descripcion = ?  WHERE comentario.idcomentario = ? ", array( "{$descripcion}",$idComentario));
    }  

    function crearDescripcion($descripcion) {    
    $insertrow = self::$db->insertRow("INSERT INTO prueba.comentario (idcomentario,descripcion) VALUES (?, ?)", array(null, "{$descripcion}"));
    }  

    function mostrarComentario($id) {
    $row = self::$db->getRows("SELECT * FROM prueba.comentario where idcomentario= ? ", array("{$id}")); 
    $ObjDemo = new ComentarioProfesor($row[0]{'idcomentario'},$row[0]{'descripcion'});
    return $ObjDemo;
    }

    function mostrarId($comentario) {
    $row = self::$db->getRows("SELECT * FROM prueba.comentario where descripcion= ? ", array("{$comentario}")); 
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

  function mostrarComentariosProfesoresMateria($id,$materia) {
/*
$a= ("SELECT * FROM (SELECT comedor.idcomedor as IDCOMEDOR, comedor.nombre as COMEDOR, comentario.idcomentario as IDCOMENTARIO, 
  comentario.descripcion as COMENTARIO FROM comedor JOIN comentariocomedor ON comedor.idcomedor = comentariocomedor.idcomedor 
  JOIN comentario ON comentariocomedor.idcomentario = comentario.idcomentario)x WHERE x.IDCOMEDOR =".$id."");*/
$a= ("SELECT * FROM (SELECT profesor.idprofesor as IDPROFESOR, profesor.nombres as NOMBREPROFESOR, materia.idmateria as IDMATERIA, materia.nombre as NOMBREMATERIA, 
  comentario.idcomentario as IDCOMENTARIO, comentario.descripcion as COMENTARIO
  FROM  profesor JOIN comentarioprofesor ON comentarioprofesor.idprofesor = profesor.idprofesor 
  JOIN comentario ON comentarioprofesor.idcomentario = comentario.idcomentario JOIN materia ON comentarioprofesor.idmateria = materia.idmateria)x
WHERE x.IDPROFESOR = ".$id." AND x.IDMATERIA=".$materia."");

    $rows = self::$db->getRows($a);        
    /*$rows = self::$db->getRows("SELECT * FROM clasedemo.comentario WHERE clasedemo.comentariocomedor.idcomedor= 1");*/        
      $arrayComedor= array();
    
        foreach ($rows as $c){          
          $comedorAuxiliar = new ComentarioProfesor($c{'IDCOMENTARIO'},$c{'COMENTARIO'});
          array_push($arrayComedor, $comedorAuxiliar);
        }
      return $arrayComedor;       
  }

  function mostrarUsuarioComentariosProfesores($id,$materia) {

$a= ("SELECT * FROM (SELECT registro.idusuario as IDUSUARIO, registro.nombre as NOMBRE, 
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

  function mostrarMateriasProfesores($id,$materia) {

$a= ("SELECT * FROM (SELECT registro.idusuario as IDUSUARIO, registro.nombre as NOMBRE, 
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
          $comedorAuxiliar = new Materia($c{'IDMATERIA'},$c{'NOMBREMATERIA'},null,null);
          array_push($arrayComedor, $comedorAuxiliar);
        }
      return $arrayComedor;       
  }


  function agregarComentarioProfesor($idusuario,$idprofesor,$descripcion,$idmateria){    
    $this->crearDescripcion($descripcion);   
    $idcomentario=$this->mostrarId($descripcion);
    $insertrow = self::$db->insertRow("INSERT INTO prueba.comentarioprofesor (idcomentarioprofesor, idusuario,idprofesor,idcomentario, idmateria) 
      VALUES (?, ?, ?, ?, ?)", 
      array(null, "{$idusuario}","{$idprofesor}","{$idcomentario}","{$idmateria}"));
  }

  function eliminarComentarioProfesor($id) {     
    $this->eliminarComentario($id);      
    $deleterow = self::$db->deleteRow("DELETE FROM prueba.comentarioprofesor WHERE idcomentario= ?", array("{$id}"));
  }  

}
?>