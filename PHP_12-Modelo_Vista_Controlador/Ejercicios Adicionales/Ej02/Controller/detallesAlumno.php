<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

require_once "../Model/Alumno.php";
require_once "../Model/Asignatura.php";

if(!isset($_REQUEST["matricula"])){
    $matricula = $_SESSION["matricula"];
}else{
    $matricula = $_REQUEST["matricula"];
}

$_SESSION["matricula"] = $matricula;

$alumno = new Alumno($matricula);
$data["asignaturas"] = $alumno->getAsignaturas();

//Recojo todas las asignaturas
$allAsig = Asignatura::getAsignaturas();


//Calculo las asignaturas que le faltan para matricular
foreach ($allAsig as $asig) {
    $aux = true;
    foreach ($data["asignaturas"] as $alumAsig) {
        if($asig->getId() == $alumAsig->getId()){
            $aux = false;
            break;
        }
    }
    if($aux){
        $data["asignAMatricular"][] = $asig;
    }
}


include "../View/infoAlumno.php";
?>