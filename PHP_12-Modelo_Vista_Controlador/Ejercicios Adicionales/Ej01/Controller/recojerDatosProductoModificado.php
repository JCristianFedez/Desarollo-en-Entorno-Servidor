<?php 
    require_once "../Model/Producto.php";
    $id = $_REQUEST["idProd"];
    $prod = Producto::getProductoById($id);
    $data["formUrl"] = "guardarProductoModificado.php";
    $data["action"] = "Modificar";
    $data["nombre"] = $prod->getNombre();
    $data["precio"] = $prod->getPrecio();
    $data["stock"] = $prod->getStock();
    $data["img"] = $prod->getImg();
    $data["id"] = $prod->getId();
    include "../View/formProducto.php";
?>