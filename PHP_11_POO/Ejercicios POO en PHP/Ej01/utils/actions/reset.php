<?php

$urlBack = "../../Ej01.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

unset($_SESSION["empleadosEj01"]);


header("Location: $urlBack");