<?php 
require_once "../Model/Producto.php";
require_once "../Model/Cliente.php";

$devolver = [];

function test(){
    // Si no introduze apiKey
    if(!isset($_REQUEST["apiKey"])){
        return ["Error" => "You can insert you apiKey"];
    }

    // Si la apiKey es invalida
    if(!Cliente::tokenExist($_REQUEST["apiKey"])){
        return ["Error" => "ApyKey invalid"];
    }

    // Como ya se ha comprobado que la key es valida le sumo 1 a su peticion
    Cliente::peticionRealizada($_REQUEST["apiKey"]);

    // Si introduce nombre, precio minimo y maximo
    if(isset($_REQUEST["nom"]) && isset($_REQUEST["min"]) && isset($_REQUEST["max"])){
        return Producto::getProductosByNombreYRango(
            $_REQUEST["nom"],
            $_REQUEST["min"],
            $_REQUEST["max"]
        );
    }

    // Si solo introduce nombre
    if(isset($_REQUEST["nom"])){
        return Producto::getProductosByNombre($_REQUEST["nom"]);
    }

    // Si solo introduce precio minimo y maximo
    if(isset($_REQUEST["min"]) && isset($_REQUEST["max"])){
        return Producto::getProductosByRangoPrecio(
            $_REQUEST["min"],
            $_REQUEST["max"]
        );
    }

    // Si introduce apyKey correcta pero parametros invalidos
    return ["Error" => "Paramaters Invalid"];
}

$devolver = test();

echo json_encode($devolver);

?>