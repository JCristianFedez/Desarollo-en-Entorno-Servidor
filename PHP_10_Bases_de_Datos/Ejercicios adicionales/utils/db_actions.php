<?php 
$pagReturn="../index.php";
if(isset($_REQUEST["action"])){
    require_once "db_connect.php";
    require_once "db_consults.php";

    switch($_REQUEST["action"]) {
        case "modificar":
            modHora($conexion,"horario",$_REQUEST["dia"],
            $_REQUEST["hora"],$_REQUEST["nuevaAsignatura"]);
            break;
    }
}
$conexion=null;
header("Location:$pagReturn");
?>

