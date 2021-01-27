<?php 

if(!isset($_REQUEST["key"])){
    header("Location: ../principal.php");
}

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include_once "../objetos/Coche.php";
include_once "../objetos/CocheLujo.php";

$coches = unserialize($_SESSION["cochesEjAdicional"]);

$key = $_REQUEST["key"];

unset($coches[$key]); // remove item at index 0
$coches = array_values($coches); // 'reindex' array

$precioCaro = 0;
$modeloCaro = "";

foreach ($coches as $coche) {//Compruebo el coche mas caro
    if(is_a($coche,"CocheLujo")){
        if($coche->getPrecioBase() > $precioCaro){
            $precioCaro = $coche->getPrecioBase();
            $modeloCaro = $coche->getModelo();
        }
    }else{
        if($coche->getPrecio() > $precioCaro){
            $precioCaro = $coche->getPrecio();
            $modeloCaro = $coche->getModelo();
        }
    }
}

$_SESSION["cocheCaroEjAdicional"]["precio"] = $precioCaro;
$_SESSION["cocheCaroEjAdicional"]["modelo"] = $modeloCaro;

$_SESSION["cochesEjAdicional"] = serialize($coches);

header("Location: ../principal.php");

?>