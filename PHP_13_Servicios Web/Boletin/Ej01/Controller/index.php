<?php 

$datos = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=Malaga,Spain&units=metric&appid=3beff7fc37c44498c438468e595cc369");

$tiempo = json_decode($datos);

include "../View/paginaPrincipal.php"
?>