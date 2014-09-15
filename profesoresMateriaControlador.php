<?php
include_once('databaseControlador.php');
include_once('profesorClase.php');
include_once('materiaClase.php');

class ProfesorMateriaControlador extends DataBaseControlador
{
    function consultarFacultad($facultad){
        $facultad = self::$db->getRow("SELECT siglas FROM facultad WHERE idfacultad=".$facultad);
        return $facultad['siglas'];
    }
    
    function consultarMateria($facultad,$carrera,$materia){
        $materia = self::$db->getRow("SELECT nombre FROM materia WHERE idfacultad=".$facultad. " AND idcarrera=".$carrera." AND idmateria=".$materia."");
        return $materia['nombre'];    
    }
    
    function mostrarProfesoresPorMateria($idMateria) {
        
        $q = ("SELECT * FROM( SELECT materia.idmateria, materia.nombre, profesor.idprofesor, profesor.nombres, profesor.apellidos FROM materia 
            JOIN profesorpormateria ON materia.idmateria = profesorpormateria.idmateria 
            JOIN profesor on profesorpormateria.idprofesor = profesor.idprofesor)x WHERE x.idmateria =".$idMateria."");
        
        $rows = self::$db->getRows($q);       
        $arrayProfesores = array();
    
        foreach ($rows as $c){
          $profesorAuxiliar = new Profesor($c{'idprofesor'},$c{'nombres'},$c{'apellidos'}, null, null);
          array_push($arrayProfesores, $profesorAuxiliar);
        }
        return $arrayProfesores;        
      }
      
      function mostrarMateriasPorProfesor($idProfesor) {
        
        $q = ("SELECT * FROM( SELECT materia.idmateria, materia.nombre, profesor.idprofesor, profesor.nombres, profesor.apellidos FROM materia 
            JOIN profesorpormateria ON materia.idmateria = profesorpormateria.idmateria 
            JOIN profesor on profesorpormateria.idprofesor = profesor.idprofesor)x WHERE x.idprofesor =".$idProfesor."");
        
        $rows = self::$db->getRows($q);
         echo json_encode($rows);             
      }
      
      function agregarMateriaProfesor($idProfesor, $idMateria) {
        
        $rows = self::$db->insertRow("INSERT INTO profesorpormateria VALUES(?,?,?)", array(null,"{$idProfesor}","{$idMateria}"));            
      }
      
       function quitarMateriaProfesor($idProfesor, $idMateria) {

        $rows = self::$db->insertRow("DELETE from profesorpormateria where idmateria = ? and idprofesor = ?", array("{$idMateria}","{$idProfesor}"));            
      }
      
      function consultarProfesor($idProfesor) {
        $rows = self::$db->getRow("SELECT FROM profesor WHERE idprofesor = ?", array("{$idProfesor}"));   
        echo json_encode($rows);     
      }

}
?>
