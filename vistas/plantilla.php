<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Restaurante-Danni</title>
    <link rel="icon" type="image/ico" href="img/favicon.ico">
    <!-- Bootstrap core CSS 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Material Design Bootstrap 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.0/css/mdb.min.css" rel="stylesheet">-->
    <link rel="stylesheet" type="text/css" href="css/mdb.min.css">

    <!-- Animate 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    -->
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
</head>
<style>
    body{
    background-image: url('img/img.jpg');
    background-repeat: no-repeat;
    background-size: cover;
    }
</style>
<body>
<!------------------- Menu ---------------------->
    <div>
        <?php require("modulos/menu.php"); ?>
    </div>
    <div>
        <br>
        <br>
        <br>
<!-------------- parte dinamica ----------------->
        <?php
            $var = new Controlador();
            $var -> enlacesPagina();
        ?>
    </div>


     <!-- JQuery 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>-->
    <script src="js/jquery-3.3.1.min.js" type="text/javascript" charset="utf-8" async defer></script>

    <!-- Bootstrap tooltips 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>-->
    <script src="js/popper.min.js" type="text/javascript" charset="utf-8" async defer></script>

    <!-- Bootstrap core JavaScript 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.2.1/js/bootstrap.min.js"></script>-->
    <script src="js/bootstrap.min.js" type="text/javascript" charset="utf-8" async defer></script>

    <!-- MDB core JavaScript 
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.7.0/js/mdb.min.js"></script>-->
    <script src="js/mdb.min.js" type="text/javascript" charset="utf-8" async defer></script>
    
    <!-- <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> -->
    <!--Requerido para uso de WOW & Animated-->
    <script src="js/wow.js"></script>
    <script>
    wow = new WOW(
      {
        animateClass: 'animated',
        offset:       100,
        callback:     function(box) {
          console.log("WOW: animating <" + box.tagName.toLowerCase() + ">")
        }
      }
    );
    wow.init();
    document.getElementById('moar').onclick = function() {
      var section = document.createElement('section');
      section.className = 'section--purple wow fadeInDown';
      this.parentNode.insertBefore(section, this);
    };
  </script>
</body>
</html>