<?php session_start(); ?>
<!DOCTYPE HTML>
<html>
       <?php include_once('metadatos.php');?>
    <body>
         <?php include_once('menuCentral.php');?> 

            <div class="wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6">
                                 <div class="col-lg-10 col-lg-offset-1 button" id="divRequerimiento" style="display: none">
                                     <label><h1 class="color"> Debe iniciar sesión</h1> </label>
                                 </div>
                                <div class="col-lg-10 col-lg-offset-1 button">
                                        
                                    <form name="form" id="formSesion">
                                        
                                        <div class="form-group">
                                            <label>Username o Email</label>
                                            <input type="text" class="form-control" required data-required-msg="Username es requerido" name="usernameSesion" placeholder="">
                                        </div>
                                        <div class="form-group">
                                            <label>Contraseña</label>
                                            <input type="password" class="form-control" required data-required-msg="Contraseña es requerida" name="passwordSesion" placeholder="">
                                        </div>                                                                            
                                        <div class="form-group">
                                                <button id="btnValidarSesion" type="button" class="btn btn-default">Iniciar Sesión</button>
                                        </div>
                                  </form>
                                </div>          
                            </div>
                            <div class="col-lg-6 " style="margin-bottom:10px">                                                    
                                <div class="col-lg-10 col-lg-offset-1 button">                                                    
                                    <form role="form" id="formRegistro">                   
                                        <div class="form-group">                                                             
                                            <label for="ejemplo_email_1">Nombre</label>                  
                                            <input type="text" class="form-control" required data-required-msg="Nombre es requerido" name="nombre"
                                                                    placeholder="Introduce tu Nombre">
                                                            
                                        </div>             
                                        <div class="form-group">                 
                                            <label for="ejemplo_email_1">Username</label>                 
                                            <input type="test" class="form-control" id="ejemplo_email_1" required data-required-msg="Username es requerido" name="username"
                                                                    placeholder="Introduce tu Username">
                                                            
                                        </div>                 
                                        <div class="form-group">                       
                                            <label for="ejemplo_email_1">Email</label>                  
                                            <input type="email" class="form-control" id="ejemplo_email_1" required data-required-msg="Email es requerido" name="email"
                                                                    placeholder="Introduce tu email">              
                                        </div>                  
                                        <div class="form-group">
                                            <label>Nueva Contraseña:</label>
                                            <input type="password" name="password" class="form-control" id="password" required data-required-msg="Contraseña es requerida">                                                                                                   
                                        </div>                                                           
                                        <div class="form-group">                                  
                                            <label>Confirmar Contraseña:</label>                                   
                                                <input type="password" class="form-control" name="confirm-password" id="confirm-password" data-bind="value: contraseniaUsuario" data-matches="#password" required data-required-msg="Debe confirmar su contraseña" data-matches-msg="Las contraseñas NO coinciden!">                                       
                                                <div id="divCheckPasswordMatch" style="color: darkred"></div>                                    
                                        </div>
                                        <button id="btnGuardarUsuario" type="button" class="btn btn-lg btn-default">Registrate</button>            
                                    </form>                
                                </div>                 
                            </div>  
                        </div>          
                    </div>                           
            </div>        
        
          <script>
              
              //validation form registro
            var validator= $("#formRegistro").kendoValidator({
                rules: {
                    matches: function (input) {
                        var matches = input.data('matches');
                        if (matches) {
                            var match = $(matches);
                            if ($.trim(input.val()) === $.trim(match.val())) {
                                return true;
                            } else {
                                return false;
                            }
                        }
                        return true;
                    }
                    
                }
            }).data('kendoValidator');

         $( "#btnGuardarUsuario" ).click(function() {
               if (validator.validate() === false) {
                return;
            } else {
                  $.ajax({
                        url: "intermediarioUsuario.php?accion=6",
                        type: "POST",
                        data: $("#formRegistro").serialize(),
                        success: function(data) {
                            alert(data);
                            if (data.indexOf("Usuario") >= 0){
                                  $('#divRequerimiento').show("swing"); 
                            }
                            else{
                                $('#divRequerimiento').hide(); 
                            }
                        }
                    });               
                }
              });
              
              
              //validacion form sesion
               var validacionSesion= $("#formSesion").kendoValidator().data('kendoValidator');

               $( "#btnValidarSesion" ).click(function() {
               if (validacionSesion.validate() === false) {
                return;
                } else {
                  $.ajax({
                        url: "intermediarioUsuario.php?accion=2",
                        type: "POST",
                        data: $("#formSesion").serialize(),
                        success: function(result) {
                            if(result == 1){
                                window.location.href = "index.php";
                            }else{
                                alert(result);
                            }
                            
                            
                        }
                    });               
                }
            });
            kendo.bind($("#example"), viewModel);
        </script>
      <?php include_once('footer.php');?>         
    </body>
</html>
