<?php 
    require_once "../Model/Producto.php";
    $nombre = $_REQUEST["nombre"];
    $precio = $_REQUEST["precio"];
    $stock = $_REQUEST["stock"];
    $img = $_REQUEST["imagen"];

    $newProd = new Producto(
        null,
        $nombre,
        $precio,
        $stock,
        $img
    );
    $newProd->insert();
    header("Location: AdminShop.php");
?>