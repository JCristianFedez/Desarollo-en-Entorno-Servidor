<?php

$urlBack = "../Ej05.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

unset($_SESSION["bombillaEj05"]);

header("Location: $urlBack");