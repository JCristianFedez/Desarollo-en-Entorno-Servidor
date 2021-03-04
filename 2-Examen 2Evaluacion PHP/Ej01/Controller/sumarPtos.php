<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "../Model/Socio.php";

$socio = Socio::getSocioById($_REQUEST["id"]);
$socio->sumarPuntos();
header("Location: index.php");
?>