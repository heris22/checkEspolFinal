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
                        <li class="button"><a style='cursor: pointer' href="administradorClubes.php">Clubs</a></li>
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
                            Selecciona el comedor a editar
                        </p>
                        <button data-bind="click: nuevoComedor" class="btn btn-lg btn-default">Nuevo Comedor</button>      
                        <button id="btnEliminarComedor" data-bind="click: eliminarComedor" class="btn btn-lg btn-default" disabled>Eliminar Comedor</button>                       
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div id="gridComedorAdmi" 
                                data-role="grid"
                                date-scrollable="true"
                                data-editable="false"
                                data-selectable="true"
                                data-columns="[
                                                { 'field': 'idcomedor', 'title':'ID', },                                            
                                                { 'field': 'nombre', 'title':'NombreComedor'},
                                               
                                                
                                             ]"
                                data-bind="source: comedor,
                                           visible: isVisible,
                                           events: {
                                             change: seleccionarComedor
                                           }"
                                style=""></div>
                   
                    </div>
                    <div class="col-lg-6">
                        <form class="form-horizontal" method="post" id="formComedor" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: idComedor" placeholder="Campo Autogenerado" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: nombreComedor" name="nombre" disabled required data-required-msg="Username es requerido">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Información:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: informacionComedor" name="descripcion" disabled required data-required-msg="Username es requerido">
                                    </div>
                                </div>
                                
                                 <div class="form-group">
                                       <label class="col-sm-2 control-label">Imagen:</label>
                                       <div class="col-sm-9">
                                          <input name="archivo" id="imagenComedor" type="file" accept="image/*" />
                                       </div>
                                 </div>
                                 <div class="form-group">
                                    <label class="col-sm-2 control-label"></label>
                                     <div class="col-sm-9">
                                        <img name='imagen' style='width: 420px; height: 150px' id="UsuarioLogo" data-bind="attr: { src: imagenSubida, alt: imageAlt }" />
                                    </div>
                                 </div>

                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <br>
                                        <button id="btnGuardarComedor" type="button" class="btn btn-lg btn-default" disabled>Guardar</button>
                                    </div>
                                </div>
                            </form>
                        
                    </div>
                </div>
            </div>
        </div>
            
        <?php include_once('footerAdministrador.php');?>        
       <script>
       function comedor(id, nombre, descripcion,imagen) {
        this.id = id;
        this.nombre = nombre;
        this.descripcion = descripcion;  
        this.imagen = imagen;      
    }

    var validator = $("#formComedor").kendoValidator().data('kendoValidator')       
            
    $("#btnGuardarComedor").click(function () {  
        if (validator.validate() === false) {      
            return;
        } else {    
            
            if (viewModel.validaCreateUpdate == true) {
                var comedorAux = new comedor(viewModel.idComedor, viewModel.nombreComedor,  viewModel.informacionComedor, viewModel.imagenSubida);
                //AJAX para guardar nuevo comedor
                $.ajax({
                    url: "intermediarioComedor.php?accion=3", 
                    type: "POST",
                    data: comedorAux,
                    success: function(data) {
                         viewModel.comedorClick();
                            alert(data);
                            
                        }
                    });
                } else {
                    //creo el elemento comedor que se enviará al php
                   var comedorAux = new comedor(viewModel.idComedor, viewModel.nombreComedor,  viewModel.informacionComedor, viewModel.imagenSubida);

                    //AJAX para editar la facultad seleccionada
                    $.ajax({
                        url: "intermediarioComedor.php?accion=4",
                        type: "POST",
                        data: comedorAux,
                        success: function (data) {
                            viewModel.comedorClick();
                            alert(data);
                            
                        }
                    });
                }              
            }               
        });

//VISTA MODELO
            var viewModel = kendo.observable({
                isVisible: true,
                comedor: "",
                validaCreateUpdate: true,
                nombreImagen: "",
                imagenSubida : "subidas/comedores/fondoComedor.png",
                idComedor: "",
                nombreComedor: "",
                informacionComedor: "",                
                comedor: function(){
                    $.ajax({
                        url: "intermediarioComedor.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("comedor", data);
                        },
                    });
                },
                comedorClick:function(){
                    $.ajax({
                        url: "intermediarioComedor.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("comedor", data);
                        },
                    });    
                },
                nuevoComedor:function() {
                    //limpia los inputs
                    viewModel.limpiarFormComedor();
                    
                     //habilita los inputs para q se pueda escribir
                    $('[name = "nombre"]').prop('disabled', false);
                    $('[name = "descripcion"]').prop('disabled', false);                   
                    $('#btnGuardarComedor').prop('disabled', false);

                    //selecciono el grid que quiero para con la lina de mas abajo limpiar la seleccion
                    var grid = $("#gridComedorAdmi").data("kendoGrid");
                    //limpia la barra gris que muestra q se ha seleccionado una facultad en el grid
                    grid.clearSelection();
                    //validaCreateUpdate cambia a TRUE
                    viewModel.set("validaCreateUpdate", true);
                },
                seleccionarComedor: function(e){
                    //validaCreateUpdate cambia a FALSE porque estoy seleccionando
                    viewModel.set("validaCreateUpdate", false);
                    //obtengo el grid del cual se hizo la selección del row
                    var sender = e.sender;
                    //obtengo la fila (datos) que seleccionó el user
                    dataItemUser = sender.dataItem(sender.select());
                    $(".k-upload-files.k-reset").find("li").remove();
                    $(".k-upload-status.k-upload-status-total").remove();


                    if (dataItemUser==null) {
                        return;
                    }
                    
                    //seteo los valores del viewModel para que en los inputs aparezca lo que he seleccionado
                    viewModel.set("idComedor", dataItemUser.idcomedor);
                    viewModel.set("nombreComedor", dataItemUser.nombre);
                    viewModel.set("informacionComedor", dataItemUser.descripcion);                    
                    viewModel.set("imagenSubida", dataItemUser.imagen);
                    
                    //al seleccionar habilito los inputs del formulario para que se pueda escribir
                  
                    $('[name = "nombre"]').prop('disabled', false);
                    $('[name = "descripcion"]').prop('disabled', false);                    
                    $('#btnGuardarComedor').prop('disabled', false);
                    $('#btnEliminarComedor').prop('disabled', false);
                    
                },
                eliminarComedor: function(){
                    //guardo en una variable el id seleccionado para saber qué eliminar
                    var id = viewModel.idComedor;
                    $.ajax({
                        url: "intermediarioComedor.php?accion=5",
                        type: "POST",
                        data: "id=" + id, 
                        success: function (data) {
                            alert(data);
                            viewModel.comedorClick();
                            viewModel.limpiarFormComedor();

                        },
                    });
                },
                limpiarFormComedor: function(){
                    //limpia los inputs
                    viewModel.set("idComedor", "");
                    viewModel.set("nombreComedor", " ");
                    viewModel.set("informacionComedor", " ");
                    viewModel.set("imagenSubida", "subidas/comedores/fondoComedor.png");
                    //deshabilita los inputs para q se pueda escribir
                    $('[name = "nombre"]').prop('disabled', true);
                    $('[name = "descripcion"]').prop('disabled', true);
                    $('#btnGuardarFacultad').prop('disabled', true);
                    $('#btnEliminarComedor').prop('disabled', true);
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
                    var urlImagen = "subidas/comedores/"+viewModel.nombreImagen;
                    //seteo la propiedad "imagenSubida" con el url para que se muestre en la pantalla del administrador luego de cargada
                    viewModel.set("imagenSubida", urlImagen);
                }
            }
        
            //upload de imagenes al upload.php que se encargará de guardarlas en la carpeta subidas/facultades/
            $("#imagenComedor").kendoUpload({
                async: {
                    saveUrl: "upload.php?accion=4",
                },
                multiple: false,
                //funcion arribita de esta
                success: onSuccess
            });

        kendo.bind($("#example"), viewModel);
    </script>
    </body>
</html>

