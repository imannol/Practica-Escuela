<?php 
if(isset($_POST['platillo']) && isset($_POST['cantidad'])) {
    $comensales = $_POST['cantidad'];

    $datosControlador = array("name"=>$_POST['platillo']);

    $respuestaPla = Datos::SeleccionPlatilloModelo($datosControlador, "platillo");
    foreach ($respuestaPla as $pla => $valorPla) {

        $pk_platillo = $valorPla['pk_platillo'];
        $nombre_platillo = $valorPla['nombre_platillo'];
    }
        ?>
<h3 id="h3-service" class="wow fadeInUp delay-1s"><?php echo $nombre_platillo;?>
<hr class="wow fadeInLeft delay-1s">

<img src="<?php echo $valorPla['img'];?>" width="210" hight="190" id="img" name="img" value="<?php echo $valorPla['img'];?>">
</h3>

<div class="col-md-12 col-sm-12 col-xs-12">
    <div class="container">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">CANTIDAD</th>
                    <th scope="col">INGREDIENTES</th>
                    <th scope="col">COSTOS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $respuestaIngre = Datos::SeleccionarIngreModelo($datosControlador, "ingredientes");
                foreach ($respuestaIngre as $ingre => $valorIngre) {
                    $pk_ingredientes = $valorIngre['pk_ingredientes'];

                    $cantidad = $valorIngre['cantidad'];
                    $ingredientes = $valorIngre['ingrediente'];
                    $costo = $valorIngre['costo'];

                    /*Calculos*/
                    $cant = $cantidad * $comensales;
                    $cost = ($cant * $costo)/$cantidad;  
                ?>
                <tr>
                    <td>
                        <?php echo $cant;?>
                    </td>
                    <td>
                        <?php echo $ingredientes;?>
                    </td>
                    <td>
                        <?php echo $cost;?>
                    </td>
                </tr>
                    <?php
                }
                $respuestaTotal = Datos::TotalModelo($datosControlador, "ingredientes");
                foreach ($respuestaTotal as $ingre => $valorTotal) {

                    $suma = $valorTotal['sum'];
                    $costTotal = $suma * $comensales; 
                }
                ?>
                <tr>
                    <td colspan="2" align="right">
                        <p>Costo Total:</p>
                    </td>
                    <td>
                        <?php echo $costTotal;?>
                    </td>
                </tr>
                <tr>
                    <td align="center">
                        <a href="index.php?accion=recetas&pk=<?php echo $_POST['platillo']; ?>">
                    <button type="button" class="btn btn-danger">Editar Nombre e Imagen</button>
                        </a>
                    </td>
                    <td align="center">
                        <a href="index.php?accion=recetas&fk=<?php echo $_POST['platillo']; ?>">
                    <button type="button" class="btn btn-danger">Editar Datos Del Platillo</button>
                        </a>
                    </td>
                    <td align="center">
                        <a href="index.php?accion=recetas&id=<?php echo $_POST['platillo']; ?>">
                    <button type="button" class="btn btn-danger">Borrar El Platillo</button>
                        </a>
                    </td>
                </tr>
            </tbody>

        </table>
    </div>
</div>
        <?php
    }


if(isset($_GET['id'])) {
    $datos = $_GET['id'];
    $respuesta = Datos::borrarPlatilloModelo($datos, "platillo", "Ingredientes");

    if($respuesta == "ok") {
        echo '<script>
                alert("Platillo Borrado Completamente")
                window.location="index.php?accion=recetas"
            </script>
        ';
    } else {
        echo '<script>
            alert("Nose Pude Realizar La Eliminación")
            window.location="index.php?accion=recetas"
        </script>
        ';
    }
}


if(isset($_GET['pk'])) {

    $datosControlador = array("name"=>$_GET['pk']);

    $respuestaPla = Datos::SeleccionPlatilloModelo($datosControlador, "platillo");
    foreach ($respuestaPla as $pla => $valorPla) {

        $pk_platillo = $valorPla['pk_platillo'];
        $nombre_platillo = $valorPla['nombre_platillo'];
    }
        ?>
<h3 id="h3-service" class="wow fadeInUp delay-1s"><?php echo $nombre_platillo;?>
<hr class="wow fadeInLeft delay-1s">

<img src="<?php echo $valorPla['img'];?>" width="210" hight="190" id="img" name="img" value="<?php echo $valorPla['img'];?>">
</h3>

<form accept-charset="utf-8" method="POST" enctype="multipart/form-data" autocomplete="false">
    <div class="form-group row">
    <div class="form-group col-6" >
      <label for="platillo" id="nom">Nombre del Platillo</label>
      <input type="text" class="form-control" id="platillo" name="tablaPlatillo" required="true">
      <small class="form-text text-muted">Escriba el nuevo nombre</small>
    </div>
    
    <div class="form-group col-6" >
      <label for="foto">Imagen</label>
        <input type="file" class="form-control-file" name="imagen">
        <small id="foto" class="form-text text-muted">Escoja la nueva imagen</small>
    </div>
    
    <div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Guardar Cambios</button></div>
  </div>
</form>
<?php
  $registro = new Controlador();
  $registro -> editarPlatilloControlador();
?>

<?php
}

if (isset($_GET['fk'])){
    $datosControlador = array("name"=>$_GET['fk']);

    $respuestaIngrediente = Datos::consultaIngredientesModelo($datosControlador, "ingredientes");
    
?>
<div class="container wow fadeInDown delay-2s">
<form method="POST" autocomplete="false">
    <div class="form-group row">
      <!-- Mostrar Platillos -->
      <div class="form-group col-md-6">
          <label for="categoria">Platillo</label>
          <select class="form-control" name="ingredient">
            <option value="">Seleccione...</option>
            <?php 
            foreach ($respuestaIngrediente as $ing => $valorIngrediente) {

                $ingredient = $valorIngrediente['ingrediente'];

                echo '<option value="'.$valorIngrediente["pk_ingredientes"].'">'.$ingredient.'</option>';
                }
            ?>
          </select>
          <small id="foto" class="form-text text-muted">Seleccione Un Platillo</small>
      </div>
    
      <div class="col-3 mb-5">
        <a href="index.php?accion=recetas&ingre=<?php echo $valorIngrediente['pk_ingredientes']; ?>">
            <button type="button" class="btn btn-primary">Ver Datos</button>
        </a>
    </div>
    </div>
</form>
</div>
<?php
}

if (isset($_GET['ingre'])) {

    $dato = $_GET['ingre'];
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
