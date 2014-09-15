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
                        <li class="button"><a style='cursor: pointer' href="administradorUsuario.php">Usuarios</a></li>
                    </ul>								
                </nav>
            </div>
        </div> 
        
	<div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <span>Profesor:  &nbsp;&nbsp;&nbsp;</span>
                        <input style="width: 40%" disabled data-bind="value: nombreProfesor" /></BR>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 col-md-5">
                        <h3>Materias asignadas:</h3>
                        <div id="gridProfesoresAdmi" 
                                data-role="grid"
                                data-scrollable="false"
                                data-editable="false"
                                data-selectable="true"
                                data-columns="[
                                                { 'field': 'idmateria', 'title':'ID', width: 60 },
                                                { 'field': 'nombre', 'title':'Nombres'},
                                             ]"
                                data-bind="source: materiasPorProfesor,
                                           visible: isVisible,
                                           events: {
                                             change: seleccionarMateriaQuitar
                                           }"
                                style=""></div>
                   
                    </div>
                     <div class="col-lg-1 col-md-1">
                         <button data-bind="click: agregarMateria" style="margin-top: 80px; margin-bottom: 15px" type="button" class="btn btn-default btn-lg">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </button>
                         <button data-bind="click: quitarMateria" style="margin-top: 65px" type="button" class="btn btn-default btn-lg">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </button>
                      </div>   
                    <div class="col-lg-6 col-md-6">
                        <h3>Materias disponibles:</h3>
                    <div id="gridMateriaAdmi" 
                                data-role="grid"
                                data-scrollable="false"
                                data-editable="false"
                                data-selectable="true"
                                data-pageable='{ "pageSize": 10 }'
                                data-columns="[
                                                { 'field': 'nombremateria', 'title':'Nombre'},
                                                { 'field': 'nombrecarrera', 'title':'Carrera', },
                                             ]"
                                data-bind="source: materias,
                                           visible: isVisible,
                                           events: {
                                             change: seleccionarMateriaAsignar
                                           }"
                                style=""></div>
                    </div>
                </div>
            </div>
        </div>
			
        <?php include_once('footerAdministrador.php');?>         
       <script>  
       
            //VISTA MODELO
            var viewModel = kendo.observable({
                isVisible: true,
                isEnabled: false,
                idMateriaAsignar: "",
                idMateriaQuitar: "",
                profesorSeleccionado: "",
                nombreProfesor: "asdas",
                materiasPorProfesor: function(){
                    var idprofesor = "<?php echo $_POST["profesor"]; ?>";
                    viewModel.set("profesorSeleccionado", idprofesor);
                     $.ajax({
                        url: "intermediarioProfesor.php?accion=5&p="+idprofesor,
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("materiasPorProfesor", data);
                            viewModel.asignarNombres();
                        }
                    });
                },
                asignarNombres: function(){
                    var nombres = "<?php echo $_POST["nombres"]; ?>";
                    var apellidos = "<?php echo $_POST["apellidos"]; ?>";
                    var nombresCompletos = nombres + " "+ apellidos;
                    viewModel.set("nombreProfesor", nombresCompletos);
                },
                materiasPorProfesorClick: function(){
                    var idprofesor = viewModel.get("profesorSeleccionado");
    
                     $.ajax({
                        url: "intermediarioProfesor.php?accion=5&p="+idprofesor,
                        dataType: 'json',                    
                        success: function (data) {
                            viewModel.set("materiasPorProfesor", data);
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
                seleccionarMateriaQuitar: function(e){
                     var sender = e.sender;
                    //obtengo la fila (datos) que seleccionó el user
                    dataItem = sender.dataItem(sender.select());
                    if (dataItem == null) {
                        return;
                    }
                    
                    //seteo los valores del viewModel para que en los inputs aparezca lo que he seleccionado
                   viewModel.set("idMateriaQuitar", dataItem.idmateria);
             
                },
                seleccionarMateriaAsignar: function(e){
                    var sender = e.sender;
                    //obtengo la fila (datos) que seleccionó el user
                    dataItem = sender.dataItem(sender.select());
                    if (dataItem == null) {
                        return;
                    }
                    
                    //seteo los valores del viewModel para que en los inputs aparezca lo que he seleccionado
                    viewModel.set("idMateriaAsignar", dataItem.idmateria);
                },
                agregarMateria: function(){
                    var profesor = viewModel.get("profesorSeleccionado");
                    var materia = viewModel.get("idMateriaAsignar");
                    $.ajax({
                        url: "intermediarioProfesor.php?accion=6&p="+profesor+"&m="+materia,
                        dataType: 'json',                    
                        complete: function (data) {
                            alert("Materia Agregada con éxito!");
                            viewModel.materiasPorProfesorClick();
                        }
                    });
                },
                quitarMateria: function(){
                    var profesor = viewModel.get("profesorSeleccionado");
                    var materia = viewModel.get("idMateriaQuitar");
                    $.ajax({
                        url: "intermediarioProfesor.php?accion=7&p="+profesor+"&m="+materia,
                        dataType: 'json',                    
                        complete: function (data) {
                            alert("Materia Eliminada con éxito!");
                            viewModel.materiasPorProfesorClick();
                        }
                    });

                    
                },
            });
        kendo.bind($("#example"), viewModel);
    </script>
    </body>
</html>

