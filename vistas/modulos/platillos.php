<h3 id="h3-service" class="wow fadeInUp delay-1s"> Agregar Ingredientes</h3>
<hr class="wow fadeInLeft delay-1s">

<div class="container wow fadeInDown delay-2s" id="registro">
  <br>
  <form accept-charset="utf-8" method="POST" enctype="multipart/form-data" autocomplete="false">
    <div class="form-group row">
      <!-- Mostrar Platillos -->
	    <div class="form-group col-md-6">
	        <label for="categoria">Platillos Disponibles</label>
	        <select class="form-control" id="platillo" name="platillo">
	          <option value="">Seleccione...</option>
	          <?php 
	            $respuesta = Datos::consultadPlatillosModelo();
	            foreach ($respuesta as $dato => $valor) {
	              echo '<option value="'.$valor["pk_platillo"].'">'.$valor["nombre_platillo"].'</option>';
	            }
	          ?>
	        </select>
	        <small id="foto" class="form-text text-muted">Seleccione Un Platillo a agregar ingredientes</small>
	    </div>

	    <div class="form-group col-6" >
	      <label for="platillo">Ingrediente</label>
	      <input type="text" class="form-control" placeholder="Arroz" name="ingrediente" required="true">
	      <small class="form-text text-muted">Escriba el ingrediente</small>
	    </div>
	    <div class="form-group col-6" >
			<label for="platillo">Cantidad</label>
	      	<input type="number" class="form-control" placeholder="2" name="cantidad" required="true">
	      	<small class="form-text text-muted">Escriba la catidad de su ingrediente</small>
		</div>
		
	    <div class="form-group col-6" >
	      <label for="platillo">Costo</label>
	      <input type="number" class="form-control" placeholder="15.50" name="costos" required="true">
	      <small class="form-text text-muted">Escriba el costo del ingrediente</small>
	    </div>

      	<div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Agregar Datos</button></div>
      </div>
    </form>
</div>
<?php
  $registro = new Controlador();
  $registro -> GuardarIngrediente();
?>