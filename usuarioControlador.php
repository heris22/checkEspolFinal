<?php

include_once('DataBaseControlador.php');
include_once('usuarioClase.php');

class UsuarioControlador extends DataBaseControlador
{
    
  function mostrarUsuario($id) {
    $row = self::$db->getRow("SELECT * FROM usuario where idusuario= ?", array("{$id}"));
    $Objusuario= new Usuario($row{'idusuario'},$row{'nombre'},$row{'username'},$row{'email'},$row{'password'},$row{'imagen'});
    return $Objusuario;  
  }
  function validaCorreo($email){
    $row = self::$db->getRow("SELECT * FROM usuario where email= ?", array("{$email}"));
    if ($row == null){
      return true;
    }else{
        return false;
    }
    
  }

  function mostrarUsuarioJson() {
    $rows = self::$db->getRows("SELECT * FROM usuario");        
    return json_encode($rows);       
  }
    
  function crearUsuario($nombre,$username,$email,$contrasenia,$imagen) {    
    $insertrow = self::$db->insertRow("INSERT INTO usuario VALUES (?, ?, ?, ?, ?, ?)", array(null, "{$nombre}", "{$username}", "{$email}", md5("{$contrasenia}"), "{$imagen}"));
  }
  
  function crearUsuario1($nombre,$username,$email,$contrasenia) {    
    $insertrow = self::$db->insertRow("INSERT INTO usuario VALUES (?, ?, ?, ?, ?, ?)", array(null, "{$nombre}", "{$username}", "{$email}", md5("{$contrasenia}"), "subidas/usuario/fondoFacultades.png"));
  }

  //function readusuario() {
    //$rows = self::$db->getRows("SELECT * FROM registro ");        
    //$arrayUsuario= array();        
    //foreach ($rows as $c){
    //  $aux = new Usuario($c{'idregistro'},$c{'nombre'},$c{'username'},$c{'email'},$c{'password'});
    //  array_push($arrayUsuario, $aux);
    //}
   // return $arrayUsuario;        
  //} 

  function actualizarUsuario($idusuario,$nombre,$username,$email,$contrasenia,$imagen) {    
    $insertrow = self::$db->updateRow("UPDATE usuario SET usuario.nombre = ? , username = ? , email = ? , password = ?, imagen = ? WHERE idusuario = ? ", array( "{$nombre}", "{$username}", "{$email}", md5("{$contrasenia}"), "{$imagen}","{$idusuario}"));
  }  

  function eliminarUsuario($id) {    
    $deleterow = self::$db->deleteRow("DELETE FROM usuario WHERE idusuario= ?", array("{$id}"));
  }  

  function validarSession($userMail, $pass){
      if (strpos($userMail,'@') !== false) {
        //es un email
            $row = self::$db->getRow("SELECT * FROM usuario where email= '$userMail'");
             
                if ($row != false){ 
                //el usuario existe
                    
                    //compara con md5
                    if($row["password"] == md5($pass)){
                    session_start();  
                    $_SESSION['usuario'] = $row["username"];
                    $_SESSION['idusuario'] =  $row["idusuario"]; 
                    //Redireccionamos a la pagina: index.php
                     echo true;
                    }else{
                        //En caso que la contraseña sea incorrecta enviamos un msj y redireccionamos a login.php

                    echo "contraseña incorrecta";
                    }           
                }else{
                    echo "El usuario no está registrado";
                }
    }else{
         //es un username
         $row = self::$db->getRow("SELECT * FROM usuario where username= '$userMail'");
            
                if ($row != false){ 
                //el usuario existe
                    
                    //compara con md5
                    if($row["password"] == md5($pass)){
                    session_start();  
                    $_SESSION['usuario'] = $row["username"];
                    $_SESSION['idusuario'] =  $row["idusuario"]; 
                    //Redireccionamos a la pagina: index.php
                     echo true;
                    }else{
                        //En caso que la contraseña sea incorrecta enviamos un msj y redireccionamos a login.php
                        echo "contraseña incorrecta";
                    }           
                }else{
                    echo "El usuario no está registrado USERNAME";
                }
            }
        }
            
                

}
