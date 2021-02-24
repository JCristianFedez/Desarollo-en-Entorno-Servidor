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
$libro->alquilar($_SESSION["nUser"]);
header("Location: inicio.php");
?>