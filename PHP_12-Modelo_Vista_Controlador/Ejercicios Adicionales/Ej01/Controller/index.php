<?php 
    require_once "../Model/Carrito.php";
    require_once "../Model/Producto.php";

    $data["productos"] = Producto::getProductos();
    $data["cantCarrito"] = Carrito::getCantTotal();
    
    include "../View/listadoProductos.php";
?>