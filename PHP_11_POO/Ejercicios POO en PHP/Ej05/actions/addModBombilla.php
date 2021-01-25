<?php 
$urlReturn = "../Ej05.php";
require_once "../objetos/Bombilla.php";

if(isset($_REQUEST["ubicacion"]) && isset($_REQUEST["potencia"])){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    include_once "../objetos/Bombilla.php"; 
    $ubicacion = $_REQUEST["ubicacion"];
    $potencia = $_REQUEST["potencia"];
    $bombillas = unserialize($_SESSION["bombillaEj05"]);

    if($_REQUEST["idBombilla"] != ""){
        $idBombilla = $_REQUEST["idBombilla"];
        $bombillas[$idBombilla]->setPotencia($potencia);
        $bombillas[$idBombilla]->setUbicacion($ubicacion);
    }else{
        $bombillas[] = new Bombilla($ubicacion,$potencia);
    }


    $_SESSION["bombillaEj05"] = serialize($bombillas);
}

header("Location: ".$urlReturn);
?>