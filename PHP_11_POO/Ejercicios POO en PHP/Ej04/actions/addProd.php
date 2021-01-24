<?php

$urlBack = "../Ej04.php";

if(isset($_REQUEST["nombre"]) && isset($_REQUEST["cantidad"]) && isset($_REQUEST["precio"])){

    include_once "../objetos/Factura.php"; 
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $factura = unserialize($_SESSION["facturaEj04"]);
    $nombre = $_REQUEST["nombre"];
    $cantidad = $_REQUEST["cantidad"];
    $precio = $_REQUEST["precio"];

    $producto = ["nombre"=>$nombre,"precio"=>$precio,"cantidad"=>$cantidad];
    $factura->agregarProducto($producto);

    $factura->setEstado("Pendiente");

    $_SESSION["facturaEj04"] = serialize($factura);
}


header("Location: $urlBack");