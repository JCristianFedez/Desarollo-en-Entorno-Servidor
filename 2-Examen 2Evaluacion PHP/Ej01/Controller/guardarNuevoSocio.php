<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "../Model/Socio.php";

if(isset($_REQUEST["guardar"])){
    $nuevoSocio = new Socio(
        "",
        $_REQUEST["nombre"],
        $_REQUEST["puntos"],
        $_REQUEST["cAutonomas"]
    );

    $nuevoSocio->insert();
    setcookie("ultimaCA", $_REQUEST["cAutonomas"], time() + 365*24*60*60);  
}

header("Location: index.php");

?>