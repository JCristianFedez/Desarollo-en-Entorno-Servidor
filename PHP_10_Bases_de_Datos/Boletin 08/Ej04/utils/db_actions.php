<?php 
//TODO: entrada salida producto
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

if(isset($_REQUEST["action"])){
    require_once "db_conect.php";
    require_once "db_consults.php";

    switch($_REQUEST["action"]){
        case "edit":
            $conexion->exec(
                editProduct($_REQUEST["codigo"],$_REQUEST["descripcion"],
                $_REQUEST["precio_compra"],$_REQUEST["precio_venta"],
                $_REQUEST["margen"],$_REQUEST["stock"]));
            break;

        case "delete":
            $conexion->exec(deleteProduct($_REQUEST["codigo"]));
            break;

        case "add":
            if(showProduct($conexion,$_REQUEST["codigo"])->rowCount() <= 0){
                $conexion->exec(addProduct($_REQUEST["codigo"],
                $_REQUEST["descripcion"],$_REQUEST["precio_compra"],$_REQUEST["precio_venta"]
                ,$_REQUEST["margen"],$_REQUEST["stock"]));
                $_SESSION["error"]=0;
            }else{
                $_SESSION["error"]=3;
            }
            break;

        case "enter":
            entradaProduct($conexion,$_REQUEST["codigo"]);
            break;

        case "exit":
            saleProducto($conexion,$_REQUEST["codigo"]);
            break;

    }
}
$conexion=null;

header("Location:../Ej04.php");

?>