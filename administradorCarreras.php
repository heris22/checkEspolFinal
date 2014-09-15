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
                        <li class="button active"><a style='cursor: pointer' href="administradorCarreras.php">Carreras</a></li>
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
                            Selecciona la Carrera a editar o eliminar
                        </p>
                        <button data-bind="click: nuevaCarrera" class="btn btn-lg btn-default">Nueva Carrera</button>  
                        <button data-bind="click: eliminarCarrera, enabled: isEnabled" class="btn btn-lg btn-default">Eliminar Carrera</button> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div id="gridMateriaAdmi" 
                                data-role="grid"
                                data-scrollable="false"
                                data-editable="false"
                                data-selectable="true"
                                data-columns="[
                                                { 'field': 'idcarrera', 'title':'ID', width: 45 },
                                                { 'field': 'siglas', 'title':'Facultad', width: 110 },
                                                { 'field': 'nombre', 'title':'Nombre'},
                                             ]"
                                data-bind="source: carrera,
                                           visible: isVisible,
                                           events: {
                                             change: seleccionarCarrera
                                           }"
                                style=""></div>
                   
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form class="form-horizontal" role="form" id="formCarreras">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: idCarrera" placeholder="Campo Autogenerado" name="id" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Facultad:</label>
                                    <div class="col-sm-9">
                                       <input data-role="combobox"
                                                data-placeholder="Escriba o seleccione facultad..."
                                                data-text-field="siglas"
                                                data-value-field="idfacultad"
                                                data-value-primitive="true"
                                                data-bind="
                                                           value : facultadSeleccionada,
                                                           source: facultades,
                                                           visible: isVisible,
                                                           enabled: isEnabled,
                                                           "
                                                style="width: 100%"
                                        required data-required-msg="Seleccione una facultad" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: nombreCarrera" name="nombre" disabled required data-required-msg="Nombre es requerido">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <br>
                                        <button id="btnGuardarCarrera" type="button" class="btn btn-lg btn-default" disabled>Guardar</button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
			
        <?php include_once('footerAdministrador.php');?>         
       <script>  
   
        function carrera(id, nombre, facultad) {
             this.id = id;
             this.nombre = nombre;
             this.facultad = facultad;
         }
   
       var validator = $("#formCarreras").kendoValidator().data('kendoValidator');    
            
    $("#btnGuardarCarrera").click(function () {  
        if (validator.validate() === false) {  
            return;
        } else {              
            if (viewModel.validaCreateUpdate == true) {
                //creo el elemento carrera que se enviará al php
                   var carreraAux = new carrera(viewModel.idCarrera, viewModel.nombreCarrera, viewModel.facultadSeleccionada);
                //AJAX para guardar nueva carrera
                $.ajax({
                    url: "intermediarioCarrera.php?accion=2", 
                    type: "POST",
                    data: carreraAux,
                    success: function(data) {
                        viewModel.carrerasClick();
                            alert(data);
                        }
                    });
                } else {
                    //creo el elemento facultad que se enviará al php
                    var carreraAux = new carrera(viewModel.idCarrera, viewModel.nombreCarrera, viewModel.facultadSeleccionada);
                    //AJAX para editar la carrera seleccionada
                    $.ajax({
                        url: "intermediarioCarrera.php?accion=3",
                        type: "POST",
                        data: carreraAux,
                        success: function (data) {
                            viewModel.carrerasClick();
                            alert(data);
                        }
                    });
                }              
            }               
        });
       
   
            //VISTA MODELO
            var viewModel = kendo.observable({
                isVisible: true,
                isEnabled: false,
                facultadSeleccionada: null,
                idCarrera: "",
                nombreCarrera: "",
                validaCreateUpdate: true,
                facultades: function(){
                    $.ajax({
                        url: "intermediarioFacultad.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("facultades", data);
                        }
                    });
                },
                carrera: function(){
                 $.ajax({
                        url: "intermediarioCarrera.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("carrera", data);
                        }
                    });
                },
                carrerasClick: function(){
                 $.ajax({
                        url: "intermediarioCarrera.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("carrera", data);
                        }
                    });
                },
                seleccionarCarrera: function(e){
                     //validaCreateUpdate cambia a FALSE porque estoy seleccionando
                    viewModel.set("validaCreateUpdate", false);
                    //obtengo el grid del cual se hizo la selección del row
                    var sender = e.sender;
                    //obtengo la fila (datos) que seleccionó el user
                    dataItem = sender.dataItem(sender.select());
                    if (dataItem == null) {
                        return;
                    }
                    
                    //seteo los valores del viewModel para que en los inputs aparezca lo que he seleccionado
                    viewModel.set("idCarrera", dataItem.idcarrera);
                    viewModel.set("nombreCarrera", dataItem.nombre);
                    viewModel.set("facultadSeleccionada", dataItem.idfacultad);
                    
                    
                    //al seleccionar habilito los inputs del formulario para que se pueda escribir
                    $('[name = "nombre"]').prop('disabled', false);
                    $('#btnGuardarCarrera').prop('disabled', false);
                    viewModel.set("isEnabled", true);
                },
                limpiarFormCarrera: function(){
                    //limpia los inputs
                    viewModel.set("idCarrera", "");
                    viewModel.set("nombreCarrera", " ");
                    viewModel.set("facultadSeleccionada", null);

                    //deshabilita los inputs para q no se pueda escribir
                    $('[name = "siglas"]').prop('disabled', true);
                    $('[name = "nombre"]').prop('disabled', true);
                    $('#btnGuardarCarrera').prop('disabled', true);
                    viewModel.set("isEnabled", false);
                },
                nuevaCarrera: function(){
                   
                    viewModel.limpiarFormCarrera();
                    viewModel.set("isEnabled", true);
                    //habilita los inputs para q se pueda escribir
                    $('[name = "siglas"]').prop('disabled', false);
                    $('[name = "nombre"]').prop('disabled', false);
                    $('#btnGuardarCarrera').prop('disabled', false);

                    //selecciono el grid que quiero para con la linea de mas abajo limpiar la seleccion
                    var grid = $("#gridCarreraAdmi").data("kendoGrid");
                    //limpia la barra gris que muestra q se ha seleccionado una facultad en el grid
                    grid.clearSelection();
                    //validaCreateUpdate cambia a TRUE
                    viewModel.set("validaCreateUpdate", true);
                    
                    
                },
                 eliminarCarrera: function(){
                    //guardo en una variable el id seleccionado para saber qué eliminar
                    var id = viewModel.idCarrera;
                    $.ajax({
                        url: "intermediarioCarrera.php?accion=4",
                        type: "POST",
                        data: "id=" + id, 
                        success: function (data) {
                            viewModel.carrerasClick();
                            alert(data);
                            viewModel.limpiarFormCarrera();
                            
                        },
                    });
                },
            });
        kendo.bind($("#example"), viewModel);
    </script>
    </body>
</html>

