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
                        <li class="button active"><a style='cursor: pointer' href="administradorFacultades.php">Facultades</a></li>
                        <li class="button"><a style='cursor: pointer' href="administradorCarreras.php">Carreras</a></li>
                        <li class="button"><a style='cursor: pointer' href="administradorMaterias.php">Materias</a></li>
                        <li class="button"><a style='cursor: pointer' href="administradorProfesores.php">Profesores</a></li>
                        <li class="button"><a style='cursor: pointer' href="administradorClub.php">Clubs</a></li>
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
                            Selecciona la facultad a editar o eliminar
                        </p>
                        <button data-bind="click: nuevaFacultad" class="btn btn-lg btn-default">Nueva Facultad</button> 
                        <button id="btnEliminarFacultad" data-bind="click: eliminarFacultad" class="btn btn-lg btn-default" disabled>Eliminar Facultad</button> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div id="gridFacultadAdmi" 
                                data-role="grid"
                                data-scrollable="false"
                                data-editable="false"
                                data-selectable="true"
                                data-columns="[
                                                { 'field': 'idfacultad', 'title':'ID', width: 45 },
                                                { 'field': 'siglas', 'title':'Siglas', width: 110 },
                                                { 'field': 'nombre', 'title':'Nombre Completo'},
                                             ]"
                                data-bind="source: facultades,
                                           visible: isVisible,
                                           events: {
                                             change: seleccionarFacultad
                                           }"
                                style=""></div>
                        <p class="fuenteSmall">* Si no escoge imagen, se asignará una imagen en blanco *</p>
                   
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form class="form-horizontal" method="post" id="formFacultades" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: idFacultad" placeholder="Campo Autogenerado" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Siglas:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: siglasFacultad" name="siglas" disabled required data-required-msg="Ingrese Datos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: nombreFacultad" name="nombre" disabled required data-required-msg="Ingrese Datos">
                                    </div>
                                </div>
                                <div class="form-group">
                                       <label class="col-sm-2 control-label">Imagen:</label>
                                       <div class="col-sm-9">
                                          <input name="archivo" id="imagenFacultad" type="file" accept="image/*" disabled>
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
                                        <button id="btnGuardarFacultad" type="button" class="btn btn-lg btn-default">Guardar</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
			
        <?php include_once('footerAdministrador.php');?>         
    <script>
                 
    function facultad(id, siglas, nombre, imagen) {
        this.id = id;
        this.siglas = siglas;
        this.nombre = nombre;
        this.imagen = imagen;
    }

    var validator = $("#formFacultades").kendoValidator().data('kendoValidator')       
            
    $("#btnGuardarFacultad").click(function () {  
        if (validator.validate() === false) {      
            return;
        } else {    
            //la variable validaCreateUpdate es un boolean que yo puse para que si es verdadero ejecute el codigo
            //para crear una nueva facultad en la base (osea cuando se haya presionado el boton que dice NUEVA FACULTAD le pongo true)
            //caso contrario se supone que seleccioné una facultad con un click por tanto actualizo
            
            if (viewModel.validaCreateUpdate == true) {
                //creo el elemento facultad que se enviará al php
                var facultadAux = new facultad(viewModel.idFacultad, viewModel.siglasFacultad, viewModel.nombreFacultad, viewModel.imagenSubida);
                //AJAX para guardar nueva facultad
                $.ajax({
                    url: "intermediarioFacultad.php?accion=3", 
                    type: "POST",
                    data: facultadAux,
                    success: function(data) {
                        viewModel.facultadesClick();
                            alert(data);
                        }
                    });
                } else {
                    //creo el elemento facultad que se enviará al php
                    var facultadAux = new facultad(viewModel.idFacultad, viewModel.siglasFacultad, viewModel.nombreFacultad, viewModel.imagenSubida);

                    //AJAX para editar la facultad seleccionada
                    $.ajax({
                        url: "intermediarioFacultad.php?accion=4",
                        type: "POST",
                        data: facultadAux,
                        success: function (data) {
                            viewModel.facultadesClick();
                            alert(data);
                        }
                    });
                }              
            }               
        });
       
       //VISTA MODELO
            var viewModel = kendo.observable({
                isVisible: true,
                facultades: "",
                validaCreateUpdate: true,
                nombreImagen: "",
                imagenSubida: "subidas/facultades/fondoFacultades.png",
                idFacultad: "",
                siglasFacultad: "",
                nombreFacultad: "",
                facultades: function(){
                    $.ajax({
                        url: "intermediarioFacultad.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("facultades", data);
                        },
                    });
                },
                facultadesClick: function(){
                    $.ajax({
                        url: "intermediarioFacultad.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("facultades", data);
                        },
                    });
                },
                nuevaFacultad:function() {
                    
                    viewModel.limpiarFormFacultad();
                    //habilita los inputs para q se pueda escribir
                    $('[name = "siglas"]').prop('disabled', false);
                    $('[name = "nombre"]').prop('disabled', false);
                    $('#btnGuardarFacultad').prop('disabled', false);
                    $('#btnEliminarFacultad').prop('disabled', false);

                    //selecciono el grid que quiero para con la lina de mas abajo limpiar la seleccion
                    var grid = $("#gridFacultadAdmi").data("kendoGrid");
                    //limpia la barra gris que muestra q se ha seleccionado una facultad en el grid
                    grid.clearSelection();
                    //validaCreateUpdate cambia a TRUE
                    viewModel.set("validaCreateUpdate", true);
                    
                     var upload = $("#imagenFacultad").data("kendoUpload");
                     upload.enable();
                },
                seleccionarFacultad: function(e){
                    //validaCreateUpdate cambia a FALSE porque estoy seleccionando
                    viewModel.set("validaCreateUpdate", false);
                    //obtengo el grid del cual se hizo la selección del row
                    var sender = e.sender;
                    //obtengo la fila (datos) que seleccionó el user
                    dataItem = sender.dataItem(sender.select());
                    $(".k-upload-files.k-reset").find("li").remove();
                    $(".k-upload-status.k-upload-status-total").remove();
                    
                    var upload = $("#imagenFacultad").data("kendoUpload");
                     upload.enable();
                    
                    if (dataItem==null) {
                        return;
                    }
                   
                    //seteo los valores del viewModel para que en los inputs aparezca lo que he seleccionado
                    viewModel.set("idFacultad", dataItem.idfacultad);
                    viewModel.set("siglasFacultad", dataItem.siglas);
                    viewModel.set("nombreFacultad", dataItem.nombre);
                    viewModel.set("imagenSubida", dataItem.imagen);
                    
                    //al seleccionar habilito los inputs del formulario para que se pueda escribir
                    $('[name = "siglas"]').prop('disabled', false);
                    $('[name = "nombre"]').prop('disabled', false);
                    $('#btnGuardarFacultad').prop('disabled', false);
                    $('#btnEliminarFacultad').prop('disabled', false);
                },
                eliminarFacultad: function(){
                    //guardo en una variable el id seleccionado para saber qué eliminar
                    var id = viewModel.idFacultad;
                    $.ajax({
                        url: "intermediarioFacultad.php?accion=5",
                        type: "POST",
                        data: "id=" + id, 
                        success: function (data) {
                            viewModel.facultadesClick();
                            alert(data);
                            viewModel.limpiarFormFacultad();
                            
                        },
                    });
                },
                limpiarFormFacultad: function(){
                    //limpia los inputs
                    viewModel.set("idFacultad", "");
                    viewModel.set("siglasFacultad", "");
                    viewModel.set("nombreFacultad", "");
                    viewModel.set("imagenSubida", "subidas/facultades/fondoFacultades.png");
                    //deshabilita los inputs para q se pueda escribir
                    $('[name = "siglas"]').prop('disabled', true);
                    $('[name = "nombre"]').prop('disabled', true);
                    $('#btnGuardarFacultad').prop('disabled', true);
                    $('#btnEliminarFacultad').prop('disabled', true);
                }
            });
            //FIN DE LA VISTA MODELO
            
            
            //funcion que se ejecuta si la imagen se subió con éxito,
            function onSuccess(e) {
                var files = e.files;
                if (e.operation == "upload") {
                    //guardo el nombre de la imagen para almacenarlo en la base y saber a qué facultad pertenece la misma
                    viewModel.set("nombreImagen",files[0].name);
                    //guardo el url de la imagen subida para tenerla en la base y poder jalarla para que se muestre en pantalla
                    var urlImagen = "subidas/facultades/"+viewModel.nombreImagen;
                    //seteo la propiedad "imagenSubida" con el url para que se muestre en la pantalla del administrador luego de cargada
                    viewModel.set("imagenSubida", urlImagen);
                    
                }
            }
        
            //upload de imagenes al upload.php que se encargará de guardarlas en la carpeta subidas/facultades/
            $("#imagenFacultad").kendoUpload({
                async: {
                    saveUrl: "upload.php?accion=1",
                },
                multiple: false,
                //funcion arribita de esta
                success: onSuccess,
                enabled: false
            });
            
        kendo.bind($("#example"), viewModel);
    </script>
    
    </body>
</html>

