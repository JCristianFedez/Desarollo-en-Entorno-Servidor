<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
require_once "../Model/Socio.php";

if(isset($_REQUEST["cant"])){
    $socios = Socio::getTopSocios($_REQUEST["cant"]);
    
    $file = fopen("../fansRosalia.csv", "w");
    $puesto = 1;
    foreach ($socios as $soc) {
        fwrite($file, $puesto++.",");
        fwrite($file, $soc->getNombre().",");
        fwrite($file, $soc->getPuntos());
        fwrite($file,PHP_EOL);
    }
    fclose($file);

    $_SESSION["guardadoFichero"] = "Fichero guardado con exito";
}

header("Location: index.php");
?>