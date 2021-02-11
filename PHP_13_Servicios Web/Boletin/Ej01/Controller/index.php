<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$data["provincia"] = "";
$data["icon"] = "";
$data["tiempo"] = "";

// Lo siguiente es para que cuando recarges la pagina no se renvie la peticion
if(!isset($_REQUEST["provincia"]) && isset($_SESSION["provincia"])){
    $data["provincia"] = $_SESSION["provincia"];
    unset($_SESSION["provincia"]);

    $datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".$data["provincia"].",Spain&units=metric&appid=3beff7fc37c44498c438468e595cc369");
    
    // Si la provincia existe
    if($datos){
        $tiempo = json_decode($datos);

        $data["icon"] = "http://openweathermap.org/img/w/".$tiempo->weather[0]->icon.".png";
        $data["tiempo"] = "<br>Tiempo: " . $tiempo->weather[0]->description . "<br>";
        $data["tiempo"] .= "Temperatura: " . $tiempo->main->temp . "<br>";
        $data["tiempo"] .= "Temp Max: " . $tiempo->main->temp_max . "<br>";
        $data["tiempo"] .= "Temp Min: " . $tiempo->main->temp_min . "<br>";
        $data["tiempo"] .= "Sensacion termica: " . $tiempo->main->feels_like . "<br>";

    }else{
        $data["provincia"] = "";
    }
    
// Cuando se pinche en una provincia se guardara en una session y se recargara la pagina
}else if(isset($_REQUEST["provincia"])){
    $_SESSION["provincia"] = $_REQUEST["provincia"];
    header("Location: index.php");

}

include "../View/paginaPrincipal.php"
?>