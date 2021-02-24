<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// Si no existe la sesion y no se han enviado valores
if(!isset($_REQUEST["nUser"]) && !isset($_SESSION["nUser"])){
    header("Location: index.php");
}

// Si no existe la sesion o se logea un nuevo usuario se carga
if(isset($_REQUEST["nUser"])){
    if(!isset($_SESSION["nUser"]) || $_SESSION["nUser"]!=$_REQUEST["nUser"]){
        $_SESSION["nUser"] = $_REQUEST["nUser"];
    }
}


require_once "../Model/Libro.php";

$data["libros"] = Libro::getLibros();
$data["nUser"] = $_SESSION["nUser"];

if(isset($_SESSION["error"])){
    $data["error"] = $_SESSION["error"];
    unset($_SESSION["error"]);
}else{
    $data["error"] = "";
}

include "../View/listadoLibros.php";
?>