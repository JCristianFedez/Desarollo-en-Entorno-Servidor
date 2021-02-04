<?php 
    require_once "../Model/Producto.php";

    $id = $_REQUEST["idProd"];
    $nombre = $_REQUEST["nombre"];
    $precio = $_REQUEST["precio"];
    $stock = $_REQUEST["stock"];
    $img = $_REQUEST["imagen"];
$prodAModificar = Producto::getProductoById($id);
$prodAModificar->setNombre($nombre);
$prodAModificar->setPrecio($precio);
$prodAModificar->setStock($stock);
$prodAModificar->setImg($img);

$prodAModificar->update();

header("Location: adminShop.php");
?>