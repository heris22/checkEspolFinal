<?php

class Carrera
{
    private $idCarrera;
    private $nombreCarrera;
    private $idFacultad;
    
     function __construct($idCarrera, $nombreCarrera, $idFacultad) {
       $this->idCarrera = $idCarrera;
       $this->nombreCarrera = $nombreCarrera;
       $this->idFacultad = $idFacultad;
     }
    
     function setIdCarrera($idCarrera){
       $this->idCarrera = $idCarrera;
     } 
     function getIdCarrera(){
       return $this->idCarrera;
     } 
     function setNombreCarrera($nombreCarrera){
       $this->nombreCarrera = $nombreCarrera;
     } 
     function getNombreCarrera(){
       return $this->nombreCarrera;
     } 
     function setIdFacultad($idFacultad){
       $this->idFacultad = $idFacultad;
     } 
     function getIdFacultad(){
       return $this->idFacultad;
     } 
}

?> 
