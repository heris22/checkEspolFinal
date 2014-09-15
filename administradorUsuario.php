<!DOCTYPE HTML>
<html>
    <?php include_once('metadatos.php');?>
    
    <body id="example" class="homepage">
         <div id="header-wrapper">	
        <!-- Header -->
            <div id="header" class="container">      
                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li class="button"><a style='cursor: pointer' href="administradorFacultades.php">Facultades</a></li>
                        <li class="button"><a style='cursor: pointer' href="administradorCarreras.php">Carreras</a></li>
                        <li class="button"><a style='cursor: pointer' href="administradorMaterias.php">Materias</a></li>
                        <li class="button"><a style='cursor: pointer' href="administradorProfesores.php">Profesores</a></li>
                        <li class="button"><a style='cursor: pointer' href="administradorClub.php">Clubs</a></li>
                        <li class="button active"><a style='cursor: pointer' href="administradorUsuario.php">Usuarios</a></li>
                    </ul>								
                </nav>
            </div>
        </div> 

        
        
        
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            Selecciona la facultad a editar o eliminar
                        </p>
                        <button data-bind="click: nuevoUsuario" class="btn btn-lg btn-default">Nuevo Usuario</button>
                        <button data-bind="click: eliminarUsuario" id="btnEliminarUsuario" class="btn btn-lg btn-default" disabled>Eliminar Usuario</button> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div id="gridUsuarioAdmi" 
                                data-role="grid"
                                data-scrollable="false"
                                data-editable="false"
                                data-selectable="true"
                                 data-columns="[
                                        {   'field': 'idusuario', 'title':'ID', width: 45},
                                        {   'field': 'nombre',  'title':'Nombre', width: 110},
                                        {   'field': 'username',  'title':'Username'},
                                        {   'field': 'email',  'title':'Email'},
                                        ]"
                                data-bind="source: usuario,
                                           visible: isVisible,
                                           events: {
                                             change: seleccionarUsuario
                                           }"
                                style="font-size: 16px"></div>
                        <p class="fuenteSmall">* Si no escoge imagen, se asignará una imagen en blanco *</p>
                   
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form class="form-horizontal" method="post" id="formUser" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: idusuario" placeholder="Campo Autogenerado" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: nombre" name="nombre" disabled required data-required-msg="Ingrese Datos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Username:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: username" name="username" disabled required data-required-msg="Ingrese Datos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Email:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: email" name="email" disabled required data-required-msg="Ingrese Datos">
                                    </div>
                                </div>
                                <div class="form-group">
                                       <label class="col-sm-2 control-label">Imagen:</label>
                                       <div class="col-sm-9">
                                          <input name="archivo" id="imagenUsuario" type="file" accept="image/*" disabled>
                                       </div>
                                   </div>
                                <div class="form-group">
                                       <label class="col-sm-2 control-label"></label>
                                       <div class="col-sm-9">
                                          <img name='imagen' style='width: 420px; height: 150px' data-bind="attr: { src: imagenSubida, alt: imageAlt }" />
                                       </div>
                                   </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button id="btnGuardarUsuario" type="button" class="btn btn-lg btn-default">Guardar</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
        
       
        <?php include_once('footerAdministrador.php');?>         
        <script> 

        function usuario(id, nombre, username, email, password, imagen){
            this.id = id;
            this.nombre = nombre;
            this.username = username;
            this.email = email;
            this.password = password;
            this.imagen = imagen;
        }

        var validator = $("#formUser").kendoValidator().data('kendoValidator')

        $("#btnGuardarUsuario").click(function() {
            if(validator.validate()===false){
                return;
            }
            else{
                if (viewModel.validaCreateUpdate==true) {
                    var usuarioAux = new usuario(viewModel.idusuario, viewModel.nombre, viewModel.username, viewModel.email, viewModel.password, viewModel.imagenSubida);
                    $.ajax({
                        url: "intermediarioUsuario.php?accion=3",
                        type: "POST",
                        data: usuarioAux,
                        success: function(data){
                            viewModel.usuarioClick();
                            alert(data);
                        }
                    });
                }
                else{
                     var usuarioAux = new usuario(viewModel.idusuario, viewModel.nombre, viewModel.username, viewModel.email, viewModel.password, viewModel.imagenSubida);
                    $.ajax({
                        url: "intermediarioUsuario.php?accion=4",
                        type: "POST",
                        data: usuarioAux,
                        success: function(data){
                            viewModel.usuarioClick();
                            alert(data);
                        }
                    });
                }
            }
        });

            var viewModel = kendo.observable({
                isVisible: true,
                usuario: "",
                validaCreateUpdate: true,
                idusuario: "",
                nombre: "",
                username: "",
                email: "",
                imagenSubida : "subidas/facultades/fondoFacultades.png",


                usuario: function(){
                    $.ajax({
                        url: "intermediarioUsuario.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("usuario", data);
                        },
                    });
                },

                usuarioClick:function(){
                    $.ajax({
                        url: "intermediarioUsuario.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("usuario", data);
                        },
                    });    
                },
                nuevoUsuario:function () {
                    viewModel.limpiarFormUsuario();
                   
                    $('[name="nombre"]').prop('disabled',false);
                    $('[name="username"]').prop('disabled',false);
                    $('[name="email"]').prop('disabled',false);
                    $('#btnGuardarUsuario').prop('disabled',false);

                    var grid = $("#gridUsuarioAdmi").data("kendoGrid");
                    grid.clearSelection();
                    viewModel.set("validaCreateUpdate", true);
                },
                seleccionarUsuario: function(e){
                    viewModel.set("validaCreateUpdate",false);
                    var sender = e.sender;
                    dataItemUser = sender.dataItem(sender.select());
                    $(".k-upload-files.k-reset").find("li").remove();
                    $(".k-upload-status.k-upload-status-total").remove();
                    
                    if (dataItemUser==null) {
                        return;
                    }

                    viewModel.set("idusuario", dataItemUser.idusuario);
                    viewModel.set("nombre", dataItemUser.nombre);
                    viewModel.set("username", dataItemUser.username);
                    viewModel.set("email", dataItemUser.email);
                    viewModel.set("password", dataItemUser.password);
                    viewModel.set("imagenSubida", dataItemUser.imagen);

                    $('[name = "idusuario"]').prop('disabled',false);
                    $('[name = "nombre"]').prop('disabled',false);
                    $('[name = "username"]').prop('disabled',false);
                    $('[name = "email"]').prop('disabled',false);
                    $('[name = "password"]').prop('disabled',false);
                    $('#btnGuardarUsuario').prop('disabled',false);
                    $('#btnEliminarUsuario').prop('disabled',false);
                    
                },
                eliminarUsuario: function(){
                    var id = viewModel.idusuario;
                    $.ajax({
                        url: "intermediarioUsuario.php?accion=5",
                        type: "POST",
                        data: "id=" + id,
                        success: function (data){
                            viewModel.usuarioClick();
                            viewModel.limpiarFormUsuario();
                             alert(data);
                        },

                    });
                },
                limpiarFormUsuario: function(){
                    //limpia los inputs
                    viewModel.set("idusuario"," ");
                    viewModel.set("nombre"," ");
                    viewModel.set("username"," ");
                    viewModel.set("email"," ");
                    viewModel.set("imagenSubida", "subidas/facultades/fondoFacultades.png");
                    
                    //deshabilita los inputs para q no se pueda escribir
                    $('[name="idusuario"]').prop('disabled',true);
                    $('[name="nombre"]').prop('disabled',true);
                    $('[name="username"]').prop('disabled',true);
                    $('[name="email"]').prop('disabled',true);
                    $('#btnGuardarUsuario').prop('disabled',true);
                }
            });

            function onSuccess(e) {
                var files = e.files;
                if (e.operation == "upload") {
                    //guardo el nombre de la imagen para almacenarlo en la base y saber a qué facultad pertenece la misma
                    viewModel.set("nombreImagen",files[0].name);
                    //guardo el url de la imagen subida para tenerla en la base y poder jalarla para que se muestre en pantalla
                    var urlImagen = "subidas/usuario/"+viewModel.nombreImagen;
                    //seteo la propiedad "imagenSubida" con el url para que se muestre en la pantalla del administrador luego de cargada
                    viewModel.set("imagenSubida", urlImagen);
                    
                }
            }
            //upload de imagenes al upload.php que se encargará de guardarlas en la carpeta subidas/facultades/
            $("#imagenUsuario").kendoUpload({
                async: {
                    saveUrl: "upload.php?accion=2",
                },
                multiple: false,
                //funcion arribita de esta
                success: onSuccess
            });
            kendo.bind($("#example"), viewModel);
        </script>
    </body>
</html>