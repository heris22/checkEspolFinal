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
                        <li class="button active"><a style='cursor: pointer' href="administradorMaterias.php">Materias</a></li>
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
                            Selecciona la Materia a editar o eliminar
                        </p>
                        <button data-bind="click: nuevaMateria" class="btn btn-lg btn-default">Nueva Materia</button>  
                        <button data-bind="click: eliminarCarrera, enabled: isEnabled" class="btn btn-lg btn-default">Eliminar Materia</button> 
                        <button id="btnGuardarMateria" class="btn btn-lg btn-default" disabled>Guardar</button> 
                    </div>
                </div>
                <div class="row">
                     <div class="col-lg-10 col-lg-offset-1 col-md-10 col-md-offset-1">
                        <form class="form-horizontal" role="form" id="formMaterias">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: idMateria" placeholder="Campo Autogenerado" name="id" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: nombreMateria" name="nombre" disabled required data-required-msg="Nombre es requerido">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Facultad:</label>
                                    <div class="col-sm-9">
                                       <input id="facultades"
                                                data-role="combobox"
                                                data-placeholder="Escriba o seleccione una facultad..."
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
                                    <label class="col-sm-2 control-label">Carrera:</label>
                                    <div class="col-sm-9">
                                       <input data-role="combobox"
                                                data-placeholder="Escriba o seleccione una carrera..."
                                                data-text-field="nombre"
                                                data-value-field="idcarrera"
                                                data-value-primitive="true"
                                                data-cascade-from="facultades"
                                                data-bind="
                                                           value : carreraSeleccionada,
                                                           source: carreras,
                                                           visible: isVisible,
                                                           enabled: isEnabled,
                                                           "
                                                style="width: 100%"
                                        required data-required-msg="Seleccione una carrera" />
                                    </div>
                                </div>
                                
                            </form>
                    </div>
                </div>
                <div class="row">
                    
                    <div class="col-lg-12 col-md-12">
                        <div id="gridMateriaAdmi" 
                                data-role="grid"
                                data-scrollable="false"
                                data-editable="false"
                                data-selectable="true"
                                data-pageable='{ "pageSize": 10 }'
                                data-columns="[
                                                { 'field': 'idmateria', 'title':'ID', width: 45 },
                                                { 'field': 'nombremateria', 'title':'Nombre'},
                                                { 'field': 'siglasfacultad', 'title':'Facultad', width: 100 },
                                                { 'field': 'nombrecarrera', 'title':'Carrera', width: 530 },
                                             ]"
                                data-bind="source: materias,
                                           visible: isVisible,
                                           events: {
                                             change: seleccionarMateria
                                           }"
                                style=""></div>
                   
                    </div>
                   
                </div>
            </div>
        </div>
			
        <?php include_once('footerAdministrador.php');?>         
       <script>  
   
        function materia(id, nombre, facultad, carrera) {
             this.id = id;
             this.nombre = nombre;
             this.facultad = facultad;
             this.carrera = carrera;
         }
   
       var validator = $("#formMaterias").kendoValidator().data('kendoValidator');    
            
    $("#btnGuardarMateria").click(function () {  
        if (validator.validate() === false) {  
            return;
        } else {              
            if (viewModel.validaCreateUpdate == true) {
                //creo el elemento materia que se enviará al php
                   var materiaAux = new materia(viewModel.idMateria, viewModel.nombreMateria, viewModel.facultadSeleccionada, viewModel.carreraSeleccionada);
                //AJAX para guardar nueva carrera
                $.ajax({
                    url: "intermediarioMateria.php?accion=2", 
                    type: "POST",
                    data: materiaAux,
                    success: function(data) {
                        viewModel.materiasClick();
                            alert(data);
                        }
                    });
                } else {
                    //creo el elemento facultad que se enviará al php
                    var materiaAux = new materia(viewModel.idMateria, viewModel.nombreMateria, viewModel.facultadSeleccionada, viewModel.carreraSeleccionada);
                    //AJAX para editar la carrera seleccionada
                    $.ajax({
                        url: "intermediarioMateria.php?accion=3",
                        type: "POST",
                        data: materiaAux,
                        success: function (data) {
                            viewModel.materiasClick();
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
                carreraSeleccionada: null,
                idMateria: "",
                nombreMateria: "",
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
                materias: function(){
                 $.ajax({
                        url: "intermediarioMateria.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("materias", data);
                        }
                    });
                },
                carreras: function(){
                 $.ajax({
                        url: "intermediarioCarrera.php?accion=5",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("carreras", data);
                        }
                    });
                },
                materiasClick: function(){
                 $.ajax({
                        url: "intermediarioMateria.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("materias", data);
                        }
                    });
                },
                seleccionarMateria: function(e){
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
                    viewModel.set("idMateria", dataItem.idmateria);
                    viewModel.set("nombreMateria", dataItem.nombremateria);
                    viewModel.set("facultadSeleccionada", dataItem.idfacultad);
                    viewModel.set("carreraSeleccionada", dataItem.idcarrera);
                    
                    //al seleccionar habilito los inputs del formulario para que se pueda escribir
                    $('[name = "nombre"]').prop('disabled', false);
                    $('#btnGuardarMateria').prop('disabled', false);
                    viewModel.set("isEnabled", true);
                },
                limpiarFormMateria: function(){
                    //limpia los inputs
                    viewModel.set("idMateria", "");
                    viewModel.set("nombreMateria", " ");
                    viewModel.set("facultadSeleccionada", null);
                    viewModel.set("carreraSeleccionada", null);

                    //deshabilita los inputs para q no se pueda escribir
                    $('[name = "nombre"]').prop('disabled', true);
                    viewModel.set("isEnabled", false);
                    $('#btnGuardarMateria').prop('disabled', true);
                },
                nuevaMateria: function(){
                    viewModel.limpiarFormMateria();
                    
                    //habilita los inputs para q se pueda escribir
                    $('[name = "nombre"]').prop('disabled', false);
                    $('#btnGuardarMateria').prop('disabled', false);

                    //selecciono el grid que quiero para con la linea de mas abajo limpiar la seleccion
                    var grid = $("#gridMateriaAdmi").data("kendoGrid");
                    //limpia la barra gris que muestra q se ha seleccionado una materia en el grid
                    grid.clearSelection();
                    //validaCreateUpdate cambia a TRUE
                    viewModel.set("validaCreateUpdate", true);
                    viewModel.set("isEnabled", true);
                    
                },
                 eliminarCarrera: function(){
                    //guardo en una variable el id seleccionado para saber qué eliminar
                    var id = viewModel.idMateria;
                    $.ajax({
                        url: "intermediarioMateria.php?accion=4",
                        type: "POST",
                        data: "id=" + id, 
                        success: function (data) {
                            viewModel.materiasClick();
                            viewModel.limpiarFormMateria();
                            alert(data);
                            
                        },
                    });
                },
            });
        kendo.bind($("#example"), viewModel);
    </script>
    </body>
</html>

