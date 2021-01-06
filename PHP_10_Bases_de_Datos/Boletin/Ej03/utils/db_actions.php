<?php 
require_once "db_connect.php";
require_once "db_consults.php";


switch($_REQUEST["accion"]){
    case "vaciarCarrito":
        deleteCarrito($conexion);
        break;
        
    case "agregarCarrito":
        addToCarrito($conexion,$_REQUEST["codigo"],1);
        break;

    case "agregarProducto":
        $urlLocal=(isset($_REQUEST["urlLocal"]))?1:0;
        addProductShop(
            $conexion,$_REQUEST["codigo"],
            $_REQUEST["nombre"],$_REQUEST["precio"],
            $_REQUEST["imagen"],$urlLocal
        );
        break;

        case "modificarProducto":
            $urlLocal=(isset($_REQUEST["urlLocal"]))?1:0;
            modProductShop(
                $conexion,$_REQUEST["codigo"],
                $_REQUEST["nombre"],$_REQUEST["precio"],
                $_REQUEST["imagen"],$urlLocal
            );
            break;

    case "eliminarUndCarrito":
        deleteProdCarrito($conexion,$_REQUEST["codigo"],1);
        break;
        
    case "eliminarProductoCarrito":
        deleteProdCarrito($conexion,$_REQUEST["codigo"]);
        break;
    case "eliminarProducto":
        deleteProd($conexion,$_REQUEST["codigo"]);
        break;
}

if(isset($_REQUEST["returnTo"])){
    header("Location: ../".$_REQUEST["returnTo"]);
}else{
    header("Location:../Ej03.php");
}

?>