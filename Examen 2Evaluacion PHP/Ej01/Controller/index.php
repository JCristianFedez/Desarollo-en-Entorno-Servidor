<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// Si ya esta logeado anteriormente no podra iniciar
// sesion hasta que se desloge el usuario anterior
if(isset($_SESSION["nUser"])){
    header("Location: inicio.php");
}else{
    include "../View/logeo.php";
}
?>