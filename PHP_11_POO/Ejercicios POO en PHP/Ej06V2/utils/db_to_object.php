<?php 

$allProducts=showAllProducts($conexion);

$productos = [];
while($prod = $allProducts->fetchObject()){
    $productos[$prod->clave] = new Producto($prod->clave,
    $prod->nombre,
    $prod->precio,
    $prod->imagen,
    $prod->url_local,
    $prod->stock);
}

$_SESSION["productos"] = serialize($productos);
