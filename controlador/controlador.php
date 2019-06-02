<?php
    class Controlador {
        static public function pagina() {
            include("vistas/plantilla.php");
        }

        static public function enlacesPagina() {
            if(isset($_GET['accion'])) {
                $enlace = $_GET['accion'];
            } else {
                $enlace = "index";
            }
            $respuesta = Paginas::enlacesPaginasModelo($enlace);
            include($respuesta);
        }

        static public function registroPlatilloControlador() {
            if(isset($_POST['tablaPlatillo'])) {
                $carpeta = "foto_platillo";
                $archivo = $_FILES['imagen']['tmp_name'];
                $nombreArchivo = $_FILES['imagen']['name'];
                $ruta = "controlador/".$carpeta."/".$nombreArchivo;

                /*$tabla = preg_replace("/[[:space:]]/","_",trim($_POST["tablaPlatillo"]));*/

                $datosControlador = array("name"=>$_POST['tablaPlatillo'],"imagen"=>$ruta);

                $respuesta = Datos::registroPlatilloModelo($datosControlador, "platillo");

                if($respuesta == "ok") {

                    if(move_uploaded_file($archivo, $ruta))
                    {
                        echo '<script>
                                alert("archivo copiado exitosamente")
                             </script>';
                    }
                    else
                    {
                        echo '<script>
                                alert("archivo NO COPIADO")
                             </script>';
                    }
                    
                    // swal("Good job!", "You clicked the button!", "success");
                    echo '<script> 
                        alert("Platillo Creado Correctamente")
                        window.location="index.php?accion=platillo"
                    </script>';
                } else {
                    echo '<script> 
                        alert("Fallo al Crear Platillo")
                        window.location="index.php?accion=platillo"
                    </script>';
                }
            }
        }
        /*Editar Platillo*/
        static public function editarPlatilloControlador(){
        if(isset($_GET['pk'])) {
                    $nombreArchivo = $_FILES['imagen']['name'];
                    $move = false;
                    if($nombreArchivo=="") {
                        $res = Datos::SeleccionPlatilloModelo($_GET['pk'], "platillo");
                        $ruta = $res['img'];
                       
                    } else {
                        $carpeta = "foto_platillo";
                        $archivo = $_FILES['imagen']['tmp_name'];
                        $ruta = "controlador/".$carpeta."/".$nombreArchivo;
                        $move = true;
                        
                    }
                    // echo "<script>alert('".$ruta."')</script>";
                    $arreglo = array("p"=>$_GET['pk'],"name"=>$_POST['tablaPlatillo'],"imagen"=>$ruta);

                    $respuestax = Datos::actualizarPlatilloModelo($arreglo, "platillo");

                    
                    if($respuestax == "ok") {

                        if($move==true) {
                            if(move_uploaded_file($archivo, $ruta))
                            {
                                echo '<script>
                                        alert("archivo editado exitosamente")
                                    </script>';
                            }
                            else
                            {
                                echo '<script>
                                        alert("archivo no editado")
                                    </script>';
                            }
                        }                     
                        echo '<script> 
                            alert("datos actualizados correctamente")
                            window.location="index.php?accion=recetas"
                        </script>';
                    } else {
                        echo '<script> 
                            alert("datos no actualizados")
                            window.location="index.php?accion=recetas"
                        </script>';
                    }
            }
        }

        static public function GuardarIngrediente(){
            if(isset($_POST['platillo'])) {

                $datosControlador = array("platillo"=>$_POST['platillo'], "ingre"=>$_POST['ingrediente'],"cant"=>$_POST['cantidad'], "costo"=>$_POST['costos']);

                $respuesta = Datos::GuardarIngredienteModelo($datosControlador, "ingredientes");

                if($respuesta == "ok") {
                    echo '<script> 
                        alert("Ingrediente guardado correctamente")
                        window.location="index.php?accion=recetas"
                    </script>';
                } else {
                    echo '<script> 
                        alert("Fallo al Guardar el Ingrediente")
                        window.location="index.php?accion=platillo"
                    </script>';
                }
            }
        }

        static public function actualizarIngredientesControlador(){
            if(isset($_POST['ingrediente'])) {

                $datosControlador = array("ingre"=>$_POST['ingrediente'],"cant"=>$_POST['cantidad'], "costo"=>$_POST['costos'], "primaria"=>$_POST['pk']);

                $respuesta = Datos::ActualizarIngredienteModelo($datosControlador, "ingredientes");

                if($respuesta == "ok") {
                    echo '<script> 
                        alert("Ingrediente Actualizado Correctamente")
                        window.location="index.php?accion=recetas"
                    </script>';
                } else {
                    echo '<script> 
                        alert("Fallo al Actualizar Datos")
                        window.location="index.php?accion=platillo"
                    </script>';
                }
            }
        }

    }
?>