<?php 
require_once "db_connect.php";
require_once "db_consults.php";
require_once "../objetos/Producto.php";
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

switch($_REQUEST["accion"]){
    case "vaciarCarrito":
        $carrito = loadCarrito($conexion);
        while ($itemCarrito = $carrito->fetchObject()) {
            addStock($conexion,$itemCarrito->clave_prod,$itemCarrito->cant);
            }
        deleteCarrito($conexion);
        break;
        
    case "agregarCarrito":
        if(quitarStock($conexion,$_REQUEST["codigo"],1)){
            addToCarrito($conexion,$_REQUEST["codigo"],1);
        }
        break;

    case "agregarProducto":
        $urlLocal=(isset($_REQUEST["urlLocal"]))?1:0;
        addProductShop(
            $conexion,$_REQUEST["codigo"],
            $_REQUEST["nombre"],$_REQUEST["precio"],
            $_REQUEST["imagen"],$urlLocal,$_REQUEST["stock"]
        );
        break;

        case "modificarProducto":
            $urlLocal=(isset($_REQUEST["urlLocal"]))?1:0;
            modProductShop(
                $conexion,$_REQUEST["codigo"],
                $_REQUEST["nombre"],$_REQUEST["precio"],
                $_REQUEST["imagen"],$urlLocal,$_REQUEST["stock"]
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

include_once "db_to_object.php";
$conexion=null;

if(isset($_REQUEST["returnTo"])){
    header("Location: ../".$_REQUEST["returnTo"]);
}else{
    header("Location:../Ej06.php");
}

?>

