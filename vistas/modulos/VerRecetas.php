<style>
  #recetas{
    background-image: url('img/copa.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.90;
    border-radius: 5px;
    text-decoration-color: white;
    color: white;
    background-position: center;
    }
  #h3-service{
    margin-left: 80px;
    text-align: center;
    color: #99FFFF;
  }
  hr{
    max-width: 450px;
      height: 2px;
      border-radius: 1px;
      background: -webkit-linear-gradient(left, #99FFFF, black);
      margin-top: 10px;
      text-align: center;
  }
  #img{
    border-radius: 5px;
  }
</style>
<h3 id="h3-service" class="wow fadeInUp delay-1s">Recetas</h3>
<hr class="wow fadeInLeft delay-1s">
<div class="container wow fadeInDown delay-2s" id="recetas">
  <br>
  <form method="POST" autocomplete="false">
    <div class="form-group row">
      <!-- Mostrar Platillos -->
      <div class="form-group col-md-6">
          <label for="categoria">Platillos</label>
          <select class="form-control" id="platillo" name="platillo">
            <option value="">Seleccione...</option>
            <?php 
              $respuesta = Datos::consultadPlatillosModelo();
              foreach ($respuesta as $dato => $valor) {
                echo '<option value="'.$valor["pk_platillo"].'">'.$valor["nombre_platillo"].'</option>';
              }
            ?>
          </select>
          <small class="form-text text-muted">Seleccione Un Platillo</small>
      </div>
      <div class="form-group col-6" >
      <label for="platillo">Para cuantas personas</label>
          <input type="number" class="form-control" placeholder="2" name="cantidad" required="true" min="1">
          <small class="form-text text-muted">Escriba para cuantas personas quiere la receta</small>
      </div>

      <div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Ver Receta</button></div>
    </div>
  </form>
</div>

<div class="container wow fadeInDown delay-2s" id="recetas">
    <?php require("recetas.php"); ?>
</div>
