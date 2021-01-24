<?php

$urlBack = "../Ej04.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

unset($_SESSION["facturaEj04"]);

header("Location: $urlBack");