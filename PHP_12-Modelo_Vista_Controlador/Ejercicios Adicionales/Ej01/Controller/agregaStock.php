<?php 
        require_once "../Model/Producto.php";
        $id = $_REQUEST["idProd"];
        $data["producto"] = Producto::getProductoById($id);

    if(isset($_REQUEST["stock"])){
        print_r($data["producto"]);
        $data["producto"]->reponer($_REQUEST["stock"]);
        header("Location: adminShop.php");
    }else{
        include "../View/introducirStock.php";
    }
?>