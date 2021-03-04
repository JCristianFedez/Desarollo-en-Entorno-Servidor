<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "../Model/Socio.php";

$uri = "http://localhost/PHP_Instituto/2-Examen%202Evaluacion%20PHP/Ej01/Services/servicio.php";


$todasAutonomas = json_decode(file_get_contents($uri));
$ultimaCA = $_COOKIE["ultimaCA"];

// No se porque pero si no lo almacenaba en un foreach la primera solo me almacenaba la 
// primera letra
foreach ($todasAutonomas as $ca) {
    if($ca == $ultimaCA){
        $data["cAutonomas"][] = $ca;
    }
}

foreach ($todasAutonomas as $ca) {
    if($ca != $ultimaCA){
        $data["cAutonomas"][] = $ca;
    }
}


include "../View/formularioNuevoSocio.php";
?>