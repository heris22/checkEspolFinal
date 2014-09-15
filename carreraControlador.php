<?php

include_once('carreraClase.php');
include_once('databaseControlador.php');


class CarreraControlador extends DataBaseControlador
{

    function mostrarCarreras($idFacultad) {

        $rows = self::$db->getRows("SELECT * FROM carrera WHERE idfacultad=".$idFacultad);       
        $arrayCarreras = array();
    
        foreach ($rows as $c){
          $carreraAuxiliar = new Carrera($c{'idcarrera'},$c{'nombre'}, $c{'idfacultad'});
          array_push($arrayCarreras, $carreraAuxiliar);
        }
         return $arrayCarreras;  
        
    }
    
     function mostrarCarrerasJson() {
        $rows = self::$db->getRows("SELECT carrera.idcarrera, carrera.nombre, facultad.siglas, facultad.idfacultad FROM carrera JOIN facultad ON carrera.idfacultad=facultad.idfacultad");        
        return json_encode($rows);       
    }
    
    function mostrarCarrerasJsonSimple() {
        $rows = self::$db->getRows("SELECT * FROM carrera");        
        return json_encode($rows);       
    }
 
    function guardarCarrera($nombre, $facultad) {
      $rows = self::$db->insertRow("INSERT INTO carrera VALUES(?,?,?)", array(null,"{$nombre}","{$facultad}"));
    }
    
    function actualizarCarrera($id, $nombre, $facultad) {
        $row = self::$db->updateRow("UPDATE carrera SET nombre = ?, idfacultad = ? WHERE idcarrera = ? ", array( "{$nombre}", "{$facultad}", "{$id}"));
    }
      
    function eliminarCarrera($id) {    
        $row = self::$db->deleteRow("DELETE FROM carrera WHERE idcarrera= ?", array("{$id}"));
  }  
    
    
}

?>

