<?php

$urlBack = "../../Ej02.php";

if(isset($_REQUEST["idMenu"]) && isset($_REQUEST["titulo"]) && isset($_REQUEST["enlace"])){

    include_once "../../objetos/Menu.php"; 
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $menus = unserialize($_SESSION["menuEj02"]);
    $idMenu = $_REQUEST["idMenu"];
    $titulo = $_REQUEST["titulo"];
    $enlace = $_REQUEST["enlace"];

    $menus[$idMenu]->addElement($titulo,$enlace);;

    $_SESSION["menuEj02"] = serialize($menus);
}


header("Location: $urlBack");