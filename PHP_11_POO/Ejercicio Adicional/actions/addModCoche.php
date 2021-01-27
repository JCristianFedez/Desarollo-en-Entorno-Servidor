<?php 

if(!isset($_REQUEST["matricula"]) ||
    !isset($_REQUEST["modelo"]) ||
    !isset($_REQUEST["precio"]) ||
    !isset($_REQUEST["suplemento"])){
    
    header("Location: ../principal.php");
}

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

include_once "../objetos/Coche.php";
include_once "../objetos/CocheLujo.php";

$coches = unserialize($_SESSION["cochesEjAdicional"]);

Coche::setPrecioCaro($_SESSION["cocheCaroEjAdicional"]["precio"]);
Coche::setModeloCaro($_SESSION["cocheCaroEjAdicional"]["modelo"]);

$matricula = $_REQUEST["matricula"];
$modelo = $_REQUEST["modelo"];
$precio = $_REQUEST["precio"];
$suplemento = $_REQUEST["suplemento"];
$existe = false;
$cont = 0;

foreach($coches as $coche){
    if($coche->getMatricula() == $matricula){
        $existe = true;
        break;
    }else{
        $cont++;
    }
}

if($suplemento == ""){//Coches normales

    if($existe){
        $coches[$cont] = new Coche($matricula,$modelo,$precio);
    }else{
        $coches[] = new Coche($matricula,$modelo,$precio);
    }

}else{//Coches de lujo

    if($existe){
        $coches[$cont] = new CocheLujo($matricula,$modelo,$precio,$suplemento);
    }else{
        $coches[] = new CocheLujo($matricula,$modelo,$precio,$suplemento);
    }
}

$_SESSION["cochesEjAdicional"] = serialize($coches);

$_SESSION["cocheCaroEjAdicional"]["precio"] = Coche::getPrecioCaro();
$_SESSION["cocheCaroEjAdicional"]["modelo"] = Coche::getModeloCaro();

header("Location: ../principal.php");

?>