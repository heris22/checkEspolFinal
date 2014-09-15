<?php 

class ComentarioComedor{


	private $idcomentario;
	private $comentario;


	function __construct($idcomentario,$comentario) {
       $this->idcomentario = $idcomentario;
       $this->comentario = $comentario;
     }


      function setIdComentario($idComentario){
       $this->idcomentario = $idComentario;
     } 
     function getIdComentario(){
       return $this->idcomentario;
     } 
      function setComentario($comentario){
       $this->comentario = $comentario;
     } 
     function getComentario(){
       return $this->comentario;
     }     

}
 ?>