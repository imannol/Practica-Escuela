<?php
    require_once("modelo/crud.php");
    require_once "modelo/enlaces.php";
    require_once "controlador/controlador.php";

    $var = new Controlador();
    $var -> pagina();
?>