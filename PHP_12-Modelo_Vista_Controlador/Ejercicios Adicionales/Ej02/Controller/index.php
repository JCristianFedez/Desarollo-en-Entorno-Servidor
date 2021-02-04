<?php 

require_once "../Model/Alumno.php";
$data["alumnos"] = Alumno::getAlumnos();
include "../View/listaAlumnos.php";
?>