<?php 
require_once "../Model/Alumno.php";

$idAsignatura = $_REQUEST["idAsignatura"];
$matricula = $_REQUEST["matricula"];

$alumno = new Alumno($matricula);

$alumno->matricularByIdAsignatura($idAsignatura);
header("Location: detallesAlumno.php");
?>