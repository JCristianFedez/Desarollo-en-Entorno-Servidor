<?php

$urlBack = "../Ej03.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

unset($_SESSION["cuboEj03"]);

header("Location: $urlBack");