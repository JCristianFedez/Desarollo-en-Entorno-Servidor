<?php 
if(isset($_REQUEST["action"])){
    require_once "db_conect.php";
    require_once "db_consults.php";

    switch($_REQUEST["action"]){
        case "edit":
            $conexion->exec(
                editClient($_REQUEST["dni"],$_REQUEST["nombre"],
                $_REQUEST["direccion"],$_REQUEST["telefono"]));
            break;

        case "delete":
            $conexion->exec(deleteClient($_REQUEST["dni"]));
            break;
            
        case "add":
            $conexion->exec(addClient($_REQUEST["dni"],
        $_REQUEST["nombre"],$_REQUEST["direccion"],$_REQUEST["telefono"]));
            break;
    }
}
header("Location:../Ej02.php");

?>