<style>
  #registro{
    background-image: url('img/copa.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    opacity: 0.95;
    border-radius: 5px;
    text-decoration-color: white;
    color: white;
    background-position: center;
    }
  #h3-service{
    color: blue;
    margin-left: 80px;
    text-align: center;
  }
  hr{
    max-width: 450px;
      height: 2px;
      border-radius: 1px;
      background: -webkit-linear-gradient(left, #99FFFF, black);
      margin-top: 10px;
      text-align: center;
  }
  #h3-service{
    color: #99FFFF;
  }
</style>
<h3 id="h3-service" class="wow fadeInUp delay-1s">REGISTRA UN PLATILLO</h3>
<hr class="wow fadeInLeft delay-1s">

<div class="container wow fadeInDown delay-2s" id="registro">
  <br>
  <form accept-charset="utf-8" method="POST" enctype="multipart/form-data" autocomplete="false">
    <div class="form-group row">
    <div class="form-group col-6" >
      <label for="platillo">Nombre del Platillo</label>
      <input type="text" class="form-control" id="tablaPlatillo" placeholder="Gelatina de Almendras" name="tablaPlatillo" required="true">
      <small class="form-text text-muted">Escriba el nombre de su platillo</small>
    </div>
    
    <div class="form-group col-6" >
      <label for="foto">Imagen</label>
        <input type="file" class="form-control-file" id="foto" name="imagen">
        <small id="foto" class="form-text text-muted">Escoja la imagen del platillo</small>
    </div>
    
    <div class="col-3 mb-5"><button type="submit" class="btn btn-primary">Guardar Platillo</button></div>
  </div>
  </form>
</div>
<?php
  $registro = new Controlador();
  $registro -> registroPlatilloControlador();
?>

<?php 

include 'platillos.php';

 ?>

