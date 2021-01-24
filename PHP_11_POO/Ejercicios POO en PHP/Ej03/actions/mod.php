<?php

$urlBack = "../Ej03.php";

if(isset($_REQUEST["idCubo"]) && isset($_REQUEST["capacidad"]) && isset($_REQUEST["contenido"])){

    include_once "../objetos/Cubo.php"; 
    
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }

    $cubos = unserialize($_SESSION["cuboEj03"]);
    $idCubo = $_REQUEST["idCubo"];
    $capacidad = $_REQUEST["capacidad"];
    $contenido = $_REQUEST["contenido"];

    $cubos[$idCubo]->setCapacidad($capacidad);
    $cubos[$idCubo]->setContenido($contenido);

    $_SESSION["cuboEj03"] = serialize($cubos);
}


header("Location: $urlBack");