<?php 
if(session_status()==PHP_SESSION_NONE){
    session_start();
}

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
            if(showClient($conexion,$_REQUEST["dni"])->rowCount() <= 0){
                $conexion->exec(addClient($_REQUEST["dni"],
                $_REQUEST["nombre"],$_REQUEST["direccion"],$_REQUEST["telefono"]));
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