<?php 
    require_once "../Model/Producto.php";
$id = $_REQUEST["idProd"];
// $prodCarrito = Carrito::getProdCarritoById($id);
$prod = Producto::getProductoById($id);
// $prodCarrito->delete();
$prod->delete();
header("Location: adminShop.php");
?>