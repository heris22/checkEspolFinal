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
                        <li class="button active"><a style='cursor: pointer' href="administradorClub.php">Clubs</a></li>
                        <li class="button"><a style='cursor: pointer' href="administradorUsuario.php">Usuarios</a></li>
                    </ul>								
                </nav>
            </div>
        </div> 
        
	<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <p>
                            Selecciona el club a editar
                        </p>
                        <button data-bind="click: nuevoClub" class="btn btn-lg btn-default">Nuevo Club</button>      
                        <button data-bind="click: eliminarClub" class="btn btn-lg btn-default">Eliminar Club</button>                       
                    </div>
                </div>
                
                    <div class="row">
                         <div class="col-lg-5">
                        <div id="gridClubAdmi" 
                                data-role="grid"
                                data-scrollable="false"
                                data-editable="false"
                                data-selectable="true"
                                data-columns="[
                                                { 'field': 'idclub', 'title':'ID', width :55},                                            
                                                { 'field': 'nombreclub', 'title':'Nombre Club'},
                                                
                                               
                                             ]"
                                data-bind="source: club,
                                           visible: isVisible,
                                           events: {
                                             change: seleccionarClub
                                           }"
                                style=""></div>
                         <p class="fuenteSmall">* Si no escoge imagen, se asignará una imagen en blanco *</p>
                   
                    </div>
                    <div class="col-lg-7">
                        <form class="form-horizontal" role="form" id="formClub">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: idClub" placeholder="Campo Autogenerado" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control"  data-bind="value: nombreClub" name="nombre" disabled required data-required-msg="Nombre es requerido">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Información:</label>
                                    <div class="col-sm-9 ">
                                        <textarea rows="3" cols="3" maxlength="250" class="prueba"  data-bind="value: informacionClub" name="informacion" disabled required data-required-msg="Informacion es requerido"> 
                                        </textarea>                       
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Misión:</label>
                                    <div class="col-sm-9">
                                         <textarea rows="3" cols="3" maxlength="250" class="prueba" data-bind="value: misionClub" name="mision" disabled required data-required-msg="Mision es requerido"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Visión:</label>
                                    <div class="col-sm-9">
                                        <textarea rows="3" cols="3" maxlength="250" class="prueba" data-bind="value: visionClub" name="vision" disabled required data-required-msg="Vision es requerido"> </textarea> 
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contacto:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: contactoClub" name="contacto" disabled required data-required-msg="Contacto es requerido">
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label">Twitter:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: twitterClub" name="twitter" disabled required data-required-msg="Twitter es requerido">
                                    </div>
                                </div>

                                 <div class="form-group">
                                       <label class="col-sm-2 control-label">Imagen:</label>
                                       <div class="col-sm-9">
                                          <input name="archivo" id="imagenClub" type="file" accept="image/*">
                                       </div>
                                   </div>
                                   <div class="form-group">
                                       <label class="col-sm-2 control-label"></label>
                                       <div class="col-sm-9">
                                          <img name='imagen' style='width: 420px; height: 150px' id="facultadLogo" data-bind="attr: { src: imagenSubida, alt: imageAlt }" />
                                       </div>
                                   </div>



                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <br>
                                        <button id="btnGuardarClub" type="button" class="btn btn-lg btn-default" disabled>Guardar</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                    </div>
            </div>
        </div>
			
        <?php include_once('footerAdministrador.php');?>        
       <script>
       function club(id, nombre , informacion , mision ,vision , contacto  , twitter , imagen) {
        this.id = id;
        this.nombre = nombre;       
        this.informacion = informacion;
        this.mision = mision;
        this.vision = vision;
        this.contacto = contacto;
        this.twitter = twitter;
        this.imagen = imagen;
    }
     function club1(id) {
        this.id = id;
    }
    
    var validator = $("#formClub").kendoValidator().data('kendoValidator')       
            
    $("#btnGuardarClub").click(function () {  
        if (validator.validate() === false) {      
            return;
        } else {    
            //la variable validaCreateUpdate es un boolean que yo puse para que si es verdadero ejecute el codigo
            //para crear una nueva facultad en la base (osea cuando se haya presionado el boton que dice NUEVA FACULTAD le pongo true)
            //caso contrario se supone que seleccioné una facultad con un click por tanto actualizo
            
            if (viewModel.validaCreateUpdate == true) {
                //creo el elemento facultad que se enviará al php
                var clubAux = new club(viewModel.idClub, viewModel.nombreClub,  viewModel.informacionClub ,  viewModel.misionClub, viewModel.visionClub, viewModel.contactoClub, viewModel.twitterClub, viewModel.imagenSubida);
                //AJAX para guardar nueva facultad
                $.ajax({
                    url: "intermediarioClub.php?accion=3", 
                    type: "POST",
                    data: clubAux,
                    success: function(data) {
                        viewModel.clubClick();
                            alert(data);
                        }
                    });
                } else {
                    //creo el elemento facultad que se enviará al php
                    var clubAux = new club(viewModel.idClub, viewModel.nombreClub,  viewModel.informacionClub,  viewModel.misionClub, viewModel.visionClub,  viewModel.contactoClub, viewModel.twitterClub, viewModel.imagenSubida);

                    //AJAX para editar la facultad seleccionada
                    $.ajax({
                        url: "intermediarioClub.php?accion=4",
                        type: "POST",
                        data: clubAux,
                        success: function (data) {
                            viewModel.clubClick();
                            alert(data);
                        }
                    });
                }              
            }               
        });

//VISTA MODELO
            var viewModel = kendo.observable({
                isVisible: true,
                club: "",
                validaCreateUpdate: true,
                nombreImagen: "",
                imagenSubida : "subidas/clubs/fondoFacultades.png",
                idClub: "",
                nombreClub: "",
                informacionClub: "",
                misionClub: "",
                visionClub: "",
                contactoClub: "",
                twitterClub: "",
                club: function(){
                    $.ajax({
                        url: "intermediarioClub.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("club", data);
                        },
                    });
                },
                clubClick: function(){
                    $.ajax({
                        url: "intermediarioClub.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("club", data);
                        },
                    });
                },

                nuevoClub:function() {
                    viewModel.limpiarFormClub();
                    
                    //habilita los inputs para q se pueda escribir
                    $('[name = "nombre"]').prop('disabled', false);
                    $('[name = "informacion"]').prop('disabled', false);
                    $('[name = "mision"]').prop('disabled', false);
                    $('[name = "vision"]').prop('disabled', false);
                    $('[name = "contacto"]').prop('disabled', false);
                    $('[name = "twitter"]').prop('disabled', false);
                    $('#btnGuardarClub').prop('disabled', false);

                    //selecciono el grid que quiero para con la lina de mas abajo limpiar la seleccion
                    var grid = $("#gridClubAdmi").data("kendoGrid");
                    //limpia la barra gris que muestra q se ha seleccionado una facultad en el grid
                    grid.clearSelection();
                    //validaCreateUpdate cambia a TRUE
                    viewModel.set("validaCreateUpdate", true);
                },
                seleccionarClub: function(e){
                    //validaCreateUpdate cambia a FALSE porque estoy seleccionando
                    viewModel.set("validaCreateUpdate", false);
                    //obtengo el grid del cual se hizo la selección del row
                    var sender = e.sender;
                    //obtengo la fila (datos) que seleccionó el user
                    dataItem = sender.dataItem(sender.select());

                    if (dataItem==null) {
                        return;
                    }
                    
                    //seteo los valores del viewModel para que en los inputs aparezca lo que he seleccionado
                    viewModel.set("idClub", dataItem.idclub);

                    viewModel.set("nombreClub", dataItem.nombreclub);
                    viewModel.set("informacionClub", dataItem.informacion);
                    viewModel.set("misionClub", dataItem.mision);
                    viewModel.set("visionClub", dataItem.vision);
                    viewModel.set("contactoClub", dataItem.contacto);
                    viewModel.set("twitterClub", dataItem.twitter);
                    viewModel.set("imagenSubida", dataItem.imagen);
                    
                    //al seleccionar habilito los inputs del formulario para que se pueda escribir
                  
                    $('[name = "nombre"]').prop('disabled', false);
                    $('[name = "informacion"]').prop('disabled', false);
                    $('[name = "mision"]').prop('disabled', false);
                    $('[name = "vision"]').prop('disabled', false);
                    $('[name = "contacto"]').prop('disabled', false);
                    $('[name = "twitter"]').prop('disabled', false);
                    $('#btnGuardarClub').prop('disabled', false);
                },
                eliminarClub: function(){
                    //guardo en una variable el id seleccionado para saber qué eliminar
                    var id = viewModel.idClub;
                    $.ajax({
                        url: "intermediarioClub.php?accion=5",
                        type: "POST",
                        data: "id=" + id, 
                        success: function (data) {
                            viewModel.clubClick();
                            alert(data);
                            viewModel.limpiarFormClub();
                        },
                    });
                },
                limpiarFormClub: function(){
                    //limpia los inputs
                    viewModel.set("idClub", "");
                    viewModel.set("nombreClub", "");
                    viewModel.set("informacionClub", "");
                    viewModel.set("misionClub", "");
                    viewModel.set("visionClub", "");
                    viewModel.set("contactoClub", "");
                    viewModel.set("twitterClub", "");
                    viewModel.set("imagenSubida", "subidas/clubs/fondoFacultades.png");
                    //deshabilita los inputs para q se pueda escribir
                   
                    $('[name = "nombre"]').prop('disabled', true);
                    $('[name = "informacion"]').prop('disabled', true);
                    $('[name = "mision"]').prop('disabled', true);
                    $('[name = "vision"]').prop('disabled', true);
                    $('[name = "contacto"]').prop('disabled', true);
                    $('[name = "twitter"]').prop('disabled', true);
                    $('#btnGuardarFacultad').prop('disabled', true);
                }                           
            });
            //FIN DE LA VISTA MODELO

            //funcion que se ejecuta si la imagen se subió con éxito,
            function onSuccess(e) {
                var files = e.files;
                if (e.operation == "upload") {
                    //guardo el nombre de la imagen para almacenarlo en la base y saber a qué club pertenece la misma
                    viewModel.set("nombreImagen",files[0].name);
                    //guardo el url de la imagen subida para tenerla en la base y poder jalarla para que se muestre en pantalla
                    var urlImagen = "subidas/clubs/"+viewModel.nombreImagen;
                    //seteo la propiedad "imagenSubida" con el url para que se muestre en la pantalla del administrador luego de cargada
                    viewModel.set("imagenSubida", urlImagen);
                }
            }
        
            //upload de imagenes al upload.php que se encargará de guardarlas en la carpeta subidas/club/
            $("#imagenClub").kendoUpload({
                async: {
                    saveUrl: "upload.php?accion=3",
                },
                multiple: false,
                //funcion arribita de esta
                success: onSuccess
            });

        kendo.bind($("#example"), viewModel);
    </script>
    </body>
</html>

