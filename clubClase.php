<?php

class Club
{
    private $idClub;
    private $nombreClub;
    private $informacion;
    private $mision;
    private $vision;
    private $contacto;
    private $twitter;
    private $imagen;
    
     function __construct($idClub, $nombreClub , $informacion , $mision ,  $vision,  $contacto ,  $twitter , $imagen) {
       $this->idClub = $idClub;
       $this->nombreClub = $nombreClub;
       $this->informacion = $informacion;
       $this->mision = $mision;
       $this->vision = $vision;
       $this->contacto = $contacto;
       $this->twitter = $twitter;
       $this->imagen = $imagen;

     }
    
     function setIdClub($idClub){
       $this->idClub = $idClub;
     } 
     function getIdClub(){
       return $this->idClub;
     } 
     function setNombreClub($nombreClub){
       $this->nombreClub = $nombreClub;
     } 
     function getNombreClub(){
       return $this->nombreClub;
     } 
    function setInformacion($informacion){
       $this->informacion = $informacion;
     } 
     function getInformacion(){
       return $this->informacion;
     } 
     function setMision($mision){
       $this->mision = $mision;
     } 
     function getMision(){
       return $this->mision;
     } 
     function setVision($vision){
       $this->vision = $vision;
     } 
     function getVision(){
       return $this->vision;
     } 
      function setContacto($contacto){
       $this->contacto = $contacto;
     } 
     function getContacto(){
       return $this->contacto;
     } 
      function setTwitter($twitter){
       $this->twitter = $twitter;
     } 
     function getTwitter(){
       return $this->twitter;
     } 
     function setImagen($nombreClub){
       $this->imagen = $imagen;
     } 
     function getImagen(){
       return $this->imagen;
     } 
     
}

?> 
