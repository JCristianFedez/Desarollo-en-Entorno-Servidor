<?php

$urlBack = "../../Ej01.php";

if(isset($_REQUEST["nombre"]) && isset($_REQUEST["sueldo"])){

    include_once "../../objetos/Empleado.php"; 
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $empleados = unserialize($_SESSION["empleadosEj01"]);
    $nombre = $_REQUEST["nombre"];
    $sueldo = $_REQUEST["sueldo"];

    $empleados[] = new Empleado($nombre,$sueldo);

    $_SESSION["empleadosEj01"] = serialize($empleados);
}


header("Location: $urlBack");