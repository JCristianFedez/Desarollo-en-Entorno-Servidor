<?php 
if(isset($_REQUEST["enviado"])){
    $uri = "http://localhost/php-instituto/PHP_13_Servicios%20Web/Adicionales/Services/tienda.php";

    if($_REQUEST["apiKey"]){

        // Se envia nombre y precio minimo y maximo
        if($_REQUEST["nombre"] && $_REQUEST["min"]!= "" && $_REQUEST["max"] != ""){
            $datos = file_get_contents(
                "$uri?apiKey=".$_REQUEST["apiKey"]
                ."&nom=".$_REQUEST["nombre"]
                ."&min=".$_REQUEST["min"]
                ."&max=".$_REQUEST["max"]
            );

            // Se envia nombre
        }else if($_REQUEST["nombre"]){
            $datos = file_get_contents(
                "$uri?apiKey=".$_REQUEST["apiKey"]
                ."&nom=".$_REQUEST["nombre"]
            );

            // Se envia precio minimo y maximo
        }else if($_REQUEST["min"] != "" && $_REQUEST["max"] != ""){
            $datos = file_get_contents(
                "$uri?apiKey=".$_REQUEST["apiKey"]
                ."&min=".$_REQUEST["min"]
                ."&max=".$_REQUEST["max"]
            );

        }else{
            $datos = file_get_contents("$uri?apiKey=".$_REQUEST["apiKey"]);
        }

    }else{
        $datos = file_get_contents("$uri");

    }

$data["productos"] = json_decode($datos);
}
include "../View/paginaPrincipal.php";
?>