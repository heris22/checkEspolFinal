<?php

include_once('profesorClase.php');
include_once('databaseControlador.php');


class ProfesorControlador extends DataBaseControlador
{
    function consultarProfesorPorLetra($letra){
        $rows = self::$db->getRows("SELECT * FROM profesor WHERE apellidos LIKE '" . $letra . "%' ORDER BY apellidos");
        
         $arrayProfesores= array();

            foreach ($rows as $c){
              $profesorAuxiliar = new Profesor($c{'idprofesor'},$c{'nombres'},$c{'apellidos'},1);
              array_push($arrayProfesores, $profesorAuxiliar);
            }
        return $arrayProfesores;          
    }
    function consultarProfesorPorApellido($busqueda){
        $rows = self::$db->getRows("SELECT * FROM profesor WHERE apellidos LIKE '%".$busqueda."%'");
         $arraybusqueda= array();
            foreach ($rows as $c){
              $busquedaAuxiliar = new Profesor($c{'idprofesor'},$c{'nombres'},$c{'apellidos'},1);
              array_push($arraybusqueda, $busquedaAuxiliar);
            }
        return $arraybusqueda;          
    }
    function mostrarProfesor($idFacultad) {

        $rows = self::$db->getRows("SELECT * FROM carrera WHERE idfacultad=".$idFacultad);       
        $arrayCarreras = array();
    
        foreach ($rows as $c){
          $carreraAuxiliar = new Carrera($c{'idcarrera'},$c{'nombre'}, $c{'idfacultad'});
          array_push($arrayCarreras, $carreraAuxiliar);
        }
         return $arrayCarreras;  
        
    }
    
     function mostrarProfesoresJson() {
        $rows = self::$db->getRows("SELECT idprofesor, CONCAT(nombres,' ',apellidos) AS nombrecompleto, nombres, apellidos, tercernivel, masterado FROM profesor");        
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

