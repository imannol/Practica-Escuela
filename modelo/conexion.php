<?php
    class Conexion {
        public function conectar() {
           
            $link = new PDO("mysql:host=localhost; dbname=res; charset=UTF8", "root", "");
            return $link;
        }
    }