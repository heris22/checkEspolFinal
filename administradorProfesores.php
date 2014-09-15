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
                        <li class="button active"><a style='cursor: pointer' href="administradorProfesores.php">Profesores</a></li>
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
                            Selecciona el Profesor a editar o eliminar
                        </p>
                        <button data-bind="click: nuevoProfesor" class="btn btn-lg btn-default">Nuevo Profesor</button>  
                        <button data-bind="click: eliminarProfesor, enabled: isEnabled" class="btn btn-lg btn-default">Eliminar Profesor</button> 
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div id="gridProfesoresAdmi" 
                                data-role="grid"
                                data-scrollable="false"
                                data-editable="false"
                                data-selectable="true"
                                data-columns="[
                                                { 'field': 'idprofesor', 'title':'ID', width: 60 },
                                                { 'field': 'nombrecompleto', 'title':'Nombres'},
                                             ]"
                                data-bind="source: profesores,
                                           visible: isVisible,
                                           events: {
                                             change: seleccionarProfesor
                                           }"
                                style=""></div>
                   
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <form class="form-horizontal" role="form" id="formProfesor">
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">ID:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: idProfesor" placeholder="Campo Autogenerado" name="id" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombres:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: nombreProfesor" name="nombre" disabled required data-required-msg="Nombres son requeridos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Apellidos:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: apellidoProfesor" name="apellido" disabled required data-required-msg="Apellidos son requeridos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">TercerNivel:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: tercernivel" name="tercernivel" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Masterado:</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" data-bind="value: masterado" name="masterado" disabled>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <input form="idAsignarMaterias" type="text" class="hidden" data-bind="value: idProfesor" name="profesor">
                                        <input form="idAsignarMaterias" type="text" class="hidden" data-bind="value: nombreProfesor" name="nombres">
                                        <input form="idAsignarMaterias" type="text" class="hidden" data-bind="value: apellidoProfesor" name="apellidos">
                                        <label class="col-sm-7 control-label"></label>
                                        <div class="col-sm-5">
                                            <input class="cursor" type="submit" form="idAsignarMaterias" value="Asignar materias" />
                                        </div>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <br>
                                        <button id="btnGuardarProfesor" type="button" class="btn btn-lg btn-default" disabled>Guardar</button>
                                    </div>
                                </div>
                            </form>
                        <form id="idAsignarMaterias" method="post" action="asignarMaterias.php"></form>
                    </div>
                </div>
            </div>
        </div>
			
        <?php include_once('footerAdministrador.php');?>         
       <script>  
   
        function profesor(id, nombre, apellido, tercernivel, masterado) {
             this.id = id;
             this.nombre = nombre;
             this.apellido = apellido;
             this.tercernivel = tercernivel;
             this.masterado = masterado;
         }
   
       var validator = $("#formProfesor").kendoValidator().data('kendoValidator');    
            
    $("#btnGuardarProfesor").click(function () {  
        if (validator.validate() === false) {  
            return;
        } else {              
            if (viewModel.validaCreateUpdate == true) {
        
                   var profesorAux = new profesor(viewModel.idProfesor, viewModel.nombreProfesor, viewModel.apellidoProfesor, viewModel.tercernivel,  viewModel.masterado);
               
                $.ajax({
                    url: "intermediarioProfesor.php?accion=2", 
                    type: "POST",
                    data: profesorAux,
                    success: function(data) {
                        viewModel.profesoresClick();
                            alert(data);
                        }
                    });
                } else {
             
                    var profesorAux = new profesor(viewModel.idProfesor, viewModel.nombreProfesor, viewModel.apellidoProfesor, viewModel.tercernivel,  viewModel.masterado);
                
                    $.ajax({
                        url: "intermediarioProfesor.php?accion=3",
                        type: "POST",
                        data: profesorAux,
                        success: function (data) {
                            viewModel.profesoresClick();
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
                idProfesor: "",
                nombreProfesor: "",
                apellidoProfesor: "",
                tercernivel: "",
                masterado: "",
                validaCreateUpdate: true,
                profesores: function(){
                     $.ajax({
                        url: "intermediarioProfesor.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("profesores", data);
                        }
                    });
                },
                profesoresClick: function(){
                 $.ajax({
                        url: "intermediarioProfesor.php?accion=1",
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("profesores", data);
                        }
                    });
                },
                seleccionarProfesor: function(e){
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
                    viewModel.set("idProfesor", dataItem.idprofesor);
                    viewModel.set("nombreProfesor", dataItem.nombres);
                    viewModel.set("apellidoProfesor", dataItem.apellidos);
                    viewModel.set("tercernivel", dataItem.tercernivel);
                    viewModel.set("masterado", dataItem.masterado);
                    
                    //al seleccionar habilito los inputs del formulario para que se pueda escribir
                    $('[name = "nombre"]').prop('disabled', false);
                    $('[name = "apellido"]').prop('disabled', false);
                    $('[name = "tercernivel"]').prop('disabled', false);
                    $('[name = "masterado"]').prop('disabled', false);
                    $('#btnGuardarProfesor').prop('disabled', false);
                    viewModel.set("isEnabled", true);
                },
                limpiarFormProfesor: function(){
                    //limpia los inputs
                    viewModel.set("idProfesor", "");
                    viewModel.set("nombreProfesor", " ");
                    viewModel.set("apellidoProfesor", " ");
                    viewModel.set("tercernivel", " ");
                    viewModel.set("masterado", " ");

                    //deshabilita los inputs para q no se pueda escribir
                    $('[name = "nombre"]').prop('disabled', true);
                    $('[name = "apellido"]').prop('disabled', true);
                    $('[name = "tercernivel"]').prop('disabled', true);
                    $('[name = "masterado"]').prop('disabled', true);
                    viewModel.set("isEnabled", false);
                    $('#btnGuardarProfesor').prop('disabled', true);
                },
                nuevoProfesor: function(){
                    viewModel.limpiarFormProfesor();
                    
                    //habilita los inputs para q se pueda escribir
                    $('[name = "nombre"]').prop('disabled', false);
                    $('[name = "apellido"]').prop('disabled', false);
                    $('[name = "tercernivel"]').prop('disabled', false);
                    $('[name = "masterado"]').prop('disabled', false);
                    $('#btnGuardarProfesor').prop('disabled', false);

                    //selecciono el grid que quiero para con la linea de mas abajo limpiar la seleccion
                    var grid = $("#gridProfesoresAdmi").data("kendoGrid");
                    //limpia la barra gris que muestra q se ha seleccionado una materia en el grid
                    grid.clearSelection();
                    //validaCreateUpdate cambia a TRUE
                    viewModel.set("validaCreateUpdate", true);
                    viewModel.set("isEnabled", true);
                    
                },
                 eliminarProfesor: function(){
                    //guardo en una variable el id seleccionado para saber qué eliminar
                    var id = viewModel.idProfesor;
                    $.ajax({
                        url: "intermediarioProfesor.php?accion=4",
                        type: "POST",
                        data: "id=" + id, 
                        success: function (data) {
                           
                            alert(data);
                            viewModel.profesoresClick();
                            viewModel.limpiarFormProfesor();
                            
                        },
                    });
                },
            });
        kendo.bind($("#example"), viewModel);
    </script>
    </body>
</html>

