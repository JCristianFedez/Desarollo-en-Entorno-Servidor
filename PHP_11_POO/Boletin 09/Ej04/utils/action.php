<?php 

if(isset($_REQUEST["cantVendidas"]) && isset($_REQUEST["zonaComprada"])){
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    include_once "../objetos/Zona.php";


    $zonas = unserialize($_SESSION["zonas"]);
    $zona = $_REQUEST["zonaComprada"];
    $cantVendidas = $_REQUEST["cantVendidas"];


    if($zonas[$zona]->venderEntrada($cantVendidas)== -1){
        $_SESSION["error"] = 1;
    }else{
        unset($_SESSION["error"]);
    }

    $_SESSION["zonas"] = serialize($zonas);
}

header("Location: ../Ej04.php");

?>