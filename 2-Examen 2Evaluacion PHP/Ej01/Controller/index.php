<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "../Model/Socio.php";

$data["socios"] = Socio::getFans();
$data["operacionesRelizadas"] = Socio::getOperaciones();

if(isset($_SESSION["guardadoFichero"])){
    $data["guardadoFichero"] = $_SESSION["guardadoFichero"];
    unset($_SESSION["guardadoFichero"]);
}

include "../View/listadoFans.php";
?>