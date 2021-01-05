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