<?php 
    require_once "../Model/Carrito.php";
    require_once "../Model/Producto.php";

    $data["fullCarrito"] = Carrito::getFullCarrito();
    $data["totalCarrito"] = 0;
    foreach($data["fullCarrito"] as  $carritoProd){
        $prod=Producto::getProductoById($carritoProd->getIdProd());

        $data["totalCarrito"]+=$prod->getPrecio()*$carritoProd->getCant();
    }
    include "../View/listaCarrito.php";
?>

<?php
