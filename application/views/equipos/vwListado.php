<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Listado de equipos</title>

	  <!-- Latest compiled and minified CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body >
	<main class="container p-2 mt-3">
		<section class="d-flex justify-content-end align-items-center" id="sec_busqueda">
				
			<div class="w-50">
				<div class="input-group p-1">
				  <input type="text" class="form-control" placeholder="Dato a buscar">
				  <button class="btn btn-primary" type="submit">Buscar</button>
				</div>				
			</div>

			<div>
				<button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#addNew">Agregar Nuevo</button>
			</div>						
		</section>
		<hr>
		<section class="container-fluid border border-success " id="tbEquipos">
			<div class="d-flex justify-content-center">
				<div id="tblTitle">
					<h2>Listado de equipos <hr></h2>
				</div>
			</div>
			<div id="tblEquipos" class="table-responsive">
				<table class="table table-dark table-striped">
				    <thead class="text-center">
				      <tr>
				        <th>Imagen</th>
				        <th>Código</th>
				        <th>Nombre</th>
				        <th>Descripción</th>
				        <th>Estado</th>
				      </tr>
				    </thead>
				    <tbody>
				      
				    </tbody>
				  </table>
			</div>
		</section>
	</main>

</body>


<!-- Modal Nuevo Equipo -->
<div class="modal fade" id="addNew">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Agregar nuevo equipo</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
        <form id="frmnwEquipo" action="<?php echo site_url('addEquipo'); ?>" method="POST"  enctype="multipart/form-data"> 
        	<div class="d-flex justify-content-around flex-column">
        		<div class="d-flex justify-content-around">
        			<div class="input-group w-25">
						    <span class="input-group-text">N°Serie:</span>
						    <input type="text" class="form-control" name="txtNwSerie">
						  </div>
						  <div class="input-group w-75">
						    <span class="input-group-text">Nombre:</span>
						    <input type="text" class="form-control" name="txtNwNombre">
						  </div>
        		</div>
        		<div class="d-flex justify-content-center p-2">
        			<div class="input-group">
        			  <label for="txtNwDescripcion">Descripción: &nbsp;&nbsp;&nbsp;&nbsp;</label>
        			  <textarea class="form-control" rows="3" id="txtNwDescripcion" name="txtNwDescripcion"></textarea>
        			</div>
        		</div>
        		<div class="p-2">
        			<div class="d-flex justify-content-start">
        				<div> <h4>Estado del equipo </h4> <hr></div>
        			</div>
        			<div class="d-flex justify-content-around">
        				<div class="form-check">
    				      <input type="radio" class="form-check-input" id="radio1" name="optradio" value="1" checked>
    				      <label class="form-check-label" for="radio1">Libre</label>
    				    </div>
    				    <div class="form-check">
    				      <input type="radio" class="form-check-input" id="radio2" name="optradio" value="2">
    				      <label class="form-check-label" for="radio2">En uso</label>
    				    </div>
    				    <div class="form-check">
    				      <input type="radio" class="form-check-input" id="radio3" name="optradio" value="3">
    				      <label class="form-check-label" for="radio3">En mantenimiento</label>
    				    </div>
    				    <div class="form-check">
    				      <input type="radio" class="form-check-input" id="radio4" name="optradio" value="0">
    				      <label class="form-check-label" for="radio4">Baja</label>
    				    </div>
        			</div>
        		</div>
        		<div class="p-2">
        			<div class="d-flex justify-content-start">
        				<div> <h4>Foto</h4> <hr></div>
        			</div>
        			<div id="imgEquipo">
        				<label for="igmNwEquipo" class="form-label">Seleccionar Imagen</label>
	                <input type="file" accept="image/*" capture="environment" class="form-control" id="igmNwEquipo" name="igmNwEquipo">
	                <div id="imagenHelp" class="form-text">Selecciona una imagen para cargar o toma una foto.</div>
        			</div>
        		</div>
        		<div class="d-flex justify-content-end">
        			<div class="p-2" >
        				<button name="btnLimpiar" type="button" onclick="cleanInputs();" class="btn btn-outline-warning">Limpiar</button>
        			</div>
        			<div class="p-2" >
        				<button name="btnGuardar" type="submit" class="btn btn-outline-success">Guardar</button>
        			</div>
        		</div>
        	</div>
        	
        </form>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cerrar</button>
      </div>

    </div>
  </div>
</div>

<!-- SCRIPTS JM -->

<script type="text/javascript">
function cleanInputs(){
		if(confirm("¿Seguro de eliminar la información agregada?"))
		{
			// Obtener el formulario
			var form = document.getElementById('frmnwEquipo');
			var checkbox1 = document.getElementById('radio1');

			// Obtener todos los elementos del formulario
			var formElements = form.elements;

			// Iterar sobre los elementos del formulario
			for (var i = 0; i < formElements.length; i++) {
			    var element = formElements[i];

			    // Inicializar el valor de los inputs
			    if (element.tagName === 'INPUT' || element.tagName === 'TEXTAREA') {
			        element.value = ''; // Aquí puedes establecer el valor inicial que desees
			    }
			}
			checkbox1.checked = true;
		}
   
}



function seleccionarCheckboxes() {
   // Obtener todos los checkboxes del formulario
   var checkboxes = document.querySelectorAll('#frmnwEquipo input[type="checkbox"]');

   // Iterar sobre los checkboxes y seleccionar los que tienen el nombre "radio1"
   for (var i = 0; i < checkboxes.length; i++) {
       var checkbox = checkboxes[i];
       if (checkbox.id === "radio1") {
           checkbox.checked = true;
       }
   }
}
</script>

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</html>