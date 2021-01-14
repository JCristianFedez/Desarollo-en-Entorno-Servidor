<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

if(isset($_REQUEST["action"])){
    require_once "db_conect.php";
    require_once "db_consults.php";

    switch($_REQUEST["action"]){
        case "edit":
            //TODO: HACER LA MODIFICACION DE PRODUCTO
            // $conexion->exec(
            //     editClient($_REQUEST["dni"],$_REQUEST["nombre"],
            //     $_REQUEST["direccion"],$_REQUEST["telefono"]));
            // break;

        case "delete":
            $conexion->exec(deleteProduct($_REQUEST["cod"]));
            break;

        case "add":
            if(showProduct($conexion,$_REQUEST["cod"])->rowCount() <= 0){
                $conexion->exec(addClient($_REQUEST["codigo"],
                $_REQUEST["descripcion"],$_REQUEST["precio_compra"],$_REQUEST["precio_venta"]
                ,$_REQUEST["margen"],$_REQUEST["stock"]));
                $_SESSION["error"]=0;
            }else{
                $_SESSION["error"]=3;
            }
            break;
    }
}
$conexion=null;

header("Location:../Ej02.php");

?>