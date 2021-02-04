<?php 

require_once "../Model/Carrito.php";

if($carritoProd = Carrito::getProdCarritoById($_REQUEST["id"])){
    $carritoProd->agregar(1);
}else{
    $carritoProd = new Carrito($_REQUEST["id"],0);
    $carritoProd->insert();
    $carritoProd->agregar(1);
}

header("Location: index.php");
 ?>