<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

unset($_SESSION["cocheCaroEjAdicional"]);
unset($_SESSION["cochesEjAdicional"]);

header("Location: ../principal.php");
