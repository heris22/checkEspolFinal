<?php

class Materia
{
    private $idMateria;
    private $nombreMateria;
    private $idFacultad;
    private $idCarrera;
    
    
     function __construct($idMateria,$nombreMateria,$idFacultad,$idCarrera) {
       $this->idMateria = $idMateria;
       $this->nombreMateria = $nombreMateria;
       $this->idFacultad = $idFacultad;
       $this->idCarrera = $idCarrera;
     }
    
     function setIdMateria($idMateria){
       $this->idMateria = $idMateria;
     } 
     function getIdMateria(){
       return $this->idMateria;
     } 
      function setNombreMateria($nombreMateria){
       $this->nombreMateria = $nombreMateria;
     } 
     function getNombreMateria(){
       return $this->nombreMateria;
     } 
     function setIdFacultad($idFacultad){
       $this->idFacultad = $idFacultad;
     } 
     function getIdFacultad(){
       return $this->idFacultad;
     } 
     function setIdCarrera($idCarrera){
       $this->idCarrera = $idCarrera;
     } 
     function getIdCarrera(){
       return $this->idCarrera;
     } 
    
}

?> 