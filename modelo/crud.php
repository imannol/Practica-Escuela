<?php
error_reporting(0);
require_once "conexion.php";
    class Datos {

        public function registroPlatilloModelo($datosModelo, $tabla) {

            $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (nombre_platillo, img) VALUES (:nombre, :img)");

            $consulta ->bindParam(":nombre",$datosModelo["name"], PDO::PARAM_STR);
            $consulta ->bindParam(":img",$datosModelo["imagen"], PDO::PARAM_STR);
            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }

        public function GuardarIngredienteModelo($datosModelo, $tabla){
            $consulta = Conexion::conectar()->prepare("INSERT INTO $tabla (cantidad, ingrediente, costo, fk_platillo) VALUES (:can, :ing, :cos, :fk)");

            $consulta ->bindParam(":ing",$datosModelo["ingre"], PDO::PARAM_STR);
            $consulta ->bindParam(":can",$datosModelo["cant"], PDO::PARAM_STR);
            $consulta ->bindParam(":cos",$datosModelo["costo"], PDO::PARAM_STR);
            $consulta ->bindParam(":fk",$datosModelo["platillo"], PDO::PARAM_STR);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }

        public function ActualizarIngredienteModelo($datosModelo, $tabla){
            $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET cantidad = :can, ingrediente = :ing, costo = :cos WHERE pk_ingredientes = :pk");

            $consulta ->bindParam(":ing",$datosModelo["ingre"], PDO::PARAM_STR);
            $consulta ->bindParam(":can",$datosModelo["cant"], PDO::PARAM_STR);
            $consulta ->bindParam(":cos",$datosModelo["costo"], PDO::PARAM_STR);
            $consulta ->bindParam(":pk",$datosModelo["primaria"], PDO::PARAM_STR);

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }
        
        public function consultadPlatillosModelo(){
            $consulta = Conexion::conectar()->prepare("SELECT pk_platillo, nombre_platillo FROM platillo");
            
            $consulta->execute();
            return $consulta->fetchAll();
            $consulta->close();
        }

        public function consultaIngredientesModelo($datosModelo, $tabla){
            $consulta = Conexion::conectar()->prepare("SELECT pk_ingredientes, cantidad, ingrediente, costo FROM $tabla WHERE fk_platillo = :fk");

            $consulta ->bindParam(":fk",$datosModelo["name"], PDO::PARAM_STR);

            $consulta->execute();
            return $consulta->fetchAll();
            $consulta->close();
        }

        public function SeleccionPlatilloModelo($datosModelo, $tabla) {

            $consulta = Conexion::conectar()->prepare("SELECT pk_platillo, nombre_platillo, img FROM $tabla WHERE pk_platillo = :pk");

            $consulta ->bindParam(":pk",$datosModelo["name"], PDO::PARAM_STR);

            $consulta->execute();

            return $consulta->fetchAll();
            $consulta->close();
        }

        public function SeleccionarIngreModelo($datosModelo, $tabla){
            $consulta = Conexion::conectar()->prepare("SELECT pk_ingredientes, cantidad, ingrediente,costo FROM $tabla WHERE fk_platillo = :pk");

            $consulta ->bindParam(":pk",$datosModelo["name"], PDO::PARAM_STR);

            $consulta->execute();

            return $consulta->fetchAll();
            $consulta->close();
        }
        public function SeleccionarIngre2Modelo($dato){
            $consulta = Conexion::conectar()->prepare("SELECT pk_ingredientes, cantidad, ingrediente,costo FROM ingredientes WHERE pk_ingredientes = $dato");

            $consulta->execute();

            return $consulta->fetchAll();
            $consulta->close();
        }
        public function TotalModelo($datosModelo, $tabla){
            $consulta = Conexion::conectar()->prepare("SELECT SUM(costo) as 'sum' FROM $tabla WHERE fk_platillo = :pk");

            $consulta ->bindParam(":pk",$datosModelo["name"], PDO::PARAM_STR);

            $consulta->execute();

            return $consulta->fetchAll();
            $consulta->close();
        }

        /*Actualizar platillo*/
        public function actualizarPlatilloModelo($datos,$tabla) {
            $consulta = Conexion::conectar()->prepare("UPDATE $tabla SET nombre_platillo = :nom, img = :imag WHERE pk_platillo = :pk");

            $consulta->bindParam(":pk",$datos['p'], PDO::PARAM_STR);
            $consulta->bindParam(":nom",$datos['name'], PDO::PARAM_STR);
            $consulta->bindParam(":imag",$datos['imagen'], PDO::PARAM_STR);
            

            if($consulta->execute()) {
                return "ok";
            } else {
                return "error";
            }
            $consulta->close();

        }

        public function borrarPlatilloModelo($datos, $pla, $ingre){
            $consulta = Conexion::conectar()->prepare("DELETE FROM $ingre WHERE $ingre.fk_platillo = :id");
            $consulta2 = Conexion::conectar()->prepare("DELETE FROM $pla WHERE $pla.pk_platillo = :id");

            $consulta2->bindParam(":id",$datos,PDO::PARAM_INT);
            $consulta->bindParam(":id",$datos,PDO::PARAM_INT);

            if($consulta->execute() && $consulta2->execute()) {
                return "ok";
            } else {
                return "error";
            }
        }

    }
?>
