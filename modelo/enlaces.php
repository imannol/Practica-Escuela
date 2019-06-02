<?php
    class Paginas {
        static public function enlacesPaginasModelo($enlace) {
            if($enlace == "platillo") {
                $modulo = "vistas/modulos/Registrar_Platillo.php";
            } else if ($enlace == "recetas") {
                $modulo = "vistas/modulos/VerRecetas.php";
            } 
            else {
                $modulo = "vistas/modulos/principal.php";
            }
            return $modulo;
        }
    }
?>