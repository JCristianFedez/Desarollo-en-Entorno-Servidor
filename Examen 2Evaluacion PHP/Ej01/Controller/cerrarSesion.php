<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}
unset($_SESSION["nUser"]);
session_destroy();

header("Location: index.php");
?>