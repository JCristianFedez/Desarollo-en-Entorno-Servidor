<?php 
require_once "db_connect.php";
require_once "db_consults.php";

switch($_REQUEST["accion"]){
    case "vaciarCarrito":
        deleteCarrito($conexion);
        break;
    case "agregarCarrito":
        echo "<script>alert(".$_REQUEST["codigo"].");</script>";
        addToCarrito($conexion,$_REQUEST["codigo"],1);
        break;
}
header("Location:../Ej03.php");
?>