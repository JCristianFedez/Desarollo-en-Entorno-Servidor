<?php

$urlBack = "../../Ej02.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

unset($_SESSION["menuEj02"]);
unset($_SESSION["vistaEj02"]);

header("Location: $urlBack");