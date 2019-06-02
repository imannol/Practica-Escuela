<?php
if (isset($_POST['ingredient'])) {

    $dato = $_POST['ingredient'];
    $respuestaDeIngre = Datos::SeleccionarIngre2Modelo($dato);
    foreach ($respuestaDeIngre as $ing => $valorDeIngre) {

        $cantidadDeIngre = $valorDeIngre['cantidad'];
        $ingredienteDeIngre = $valorDeIngre['ingrediente'];
        $costoDeIngre = $valorDeIngre['costo'];
        $pkDeingre = $valorDeIngre['pk_ingredientes'];
    }
?>
<form method="POST" autocomplete="false">
<div class="form-group row">
    <div class="form-group col-6" >
      <label for="platillo">Editar Ingrediente</label>
      <input type="text" class="form-control" name="ingrediente" required="true" value="<?php echo $ingredienteDeIngre; ?>">
      <small class="form-text text-muted">Escriba el ingrediente</small>
    </div>

    <div class="form-group col-6" >
        <label for="platillo">Editar Cantidad</label>
        <input type="number" class="form-control" name="cantidad" required="true" value="<?php echo $cantidadDeIngre; ?>">
        <small class="form-text text-muted">Escriba la catidad de su ingrediente</small>
    </div>
    
    <div class="form-group col-6" >
      <label for="platillo">Costo</label>
      <input type="number" class="form-control" name="costos" required="true" value="<?php echo $costoDeIngre; ?>">
      <small class="form-text text-muted">Escriba el costo del ingrediente</small>
    </div>
    <div class="form-group col-6" >
      <input type="hidden" class="form-control" name="pk" value="<?php echo $pkDeingre; ?>">
    </div>

    <div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Agregar Datos</button></div>
</div>
</form>
<?php
    $editar = new Controlador();
    $editar -> actualizarIngredientesControlador();
?>

<?php
}
?> 
