<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(!isset($_SESSION["nUser"])){
    header("Location: index.php");
}

if(!isset($_REQUEST["isbn"])){
    header("Location: inicio.php");
}

require_once "../Model/Libro.php";
$libro = Libro::getLibroByIsbn($_REQUEST["isbn"]);
$error = $libro->devolver($_SESSION["nUser"]);

if($error == "0"){
    $_SESSION["error"] = "Usted no puede devolver un libro que no ha alquilado";
}
header("Location: inicio.php");

?>