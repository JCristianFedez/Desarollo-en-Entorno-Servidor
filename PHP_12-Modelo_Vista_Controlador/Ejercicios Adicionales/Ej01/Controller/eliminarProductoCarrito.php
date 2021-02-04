<?php 
    require_once "../Model/Carrito.php";
    require_once "../Model/Producto.php";

    $id = $_REQUEST["idProd"];
    $cantidad = $_REQUEST["cantidad"];

    if($cantidad == "unidad"){
        $carritoProd = Carrito::getProdCarritoById($id);
        $carritoProd->quitar(1);
    }else if($cantidad == "todos"){
        $carritoProd = Carrito::getProdCarritoById($id);
        $carritoProd->delete();
    }
header("Location: miCarrito.php");
?>