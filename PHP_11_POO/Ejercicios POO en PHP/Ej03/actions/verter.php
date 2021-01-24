<?php

$urlBack = "../Ej03.php";

if(isset($_REQUEST["deEste"]) && isset($_REQUEST["aEste"])){

    include_once "../objetos/Cubo.php"; 
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $cubos = unserialize($_SESSION["cuboEj03"]);
    $deEste = $_REQUEST["deEste"];
    $aEste = $_REQUEST["aEste"];

    $cubos[$deEste]->verterEn($cubos[$aEste]);

    $_SESSION["cuboEj03"] = serialize($cubos);
}


header("Location: $urlBack");