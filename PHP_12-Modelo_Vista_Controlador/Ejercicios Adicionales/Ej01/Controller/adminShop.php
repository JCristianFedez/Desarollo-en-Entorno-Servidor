<?php 
    require_once "../Model/Carrito.php";
    require_once "../Model/Producto.php";

    $data["productos"] = Producto::getProductos();
    
    include "../View/administrarTienda.php";
?>