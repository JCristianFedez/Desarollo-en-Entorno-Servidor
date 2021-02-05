<?php 

require_once "../Model/Alumno.php";

$matricula = $_REQUEST["matricula"];

$alumno = Alumno::getAlumnoByMatricula($matricula);
$alumno->delete();
header("Location: index.php");
 ?>