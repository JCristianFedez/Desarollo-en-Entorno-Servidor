<?php 

require_once "../Model/Asignatura.php";

$id = $_REQUEST["id"];
$asignatura = Asignatura::getAsignaturaById($id);
$asignatura->delete();

header("Location: verAsignaturas.php");
?>