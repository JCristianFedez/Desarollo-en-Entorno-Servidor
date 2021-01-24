<?php 
$urlReturn = "../Ej05.php";

if(isset($_REQUEST["idBombilla"])){
    if(session_status() == PHP_SESSION_NONE){
        session_start();
    }
    
    include_once "../objetos/Bombilla.php"; 
    $bombillas = unserialize($_SESSION["bombillaEj05"]);
    $idBombilla = $_REQUEST["idBombilla"];
    $estado = $bombillas[$idBombilla]->getEstado();

    switch($estado){
        case "on":
            $bombillas[$idBombilla]->apagar();
            break;
        case "off":
            $bombillas[$idBombilla]->encender();
            break;
    }
    $_SESSION["bombillaEj05"] = serialize($bombillas);
}

header("Location: ".$urlReturn);
?>