<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_SESSION["mensaje"])){
    $data["mensaje"] = $_SESSION["mensaje"];
    unset($_SESSION["mensaje"]);
}else{
    $data["mensaje"] = "";
}
include "../View/paginaPrincipal.php";
?>