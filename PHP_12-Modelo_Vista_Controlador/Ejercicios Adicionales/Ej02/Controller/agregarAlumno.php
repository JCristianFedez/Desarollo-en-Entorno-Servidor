<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if(isset($_REQUEST["guardar"])){
    require_once "../Model/Alumno.php";
    
    $matricula = $_REQUEST["matricula"];
    $nombre = $_REQUEST["nombre"];
    $apellidos = $_REQUEST["apellidos"];
    $curso = $_REQUEST["curso"];

    $nuevoAlumno = new Alumno(
        $matricula,
        $nombre,
        $apellidos,
        $curso
    );

    if(Alumno::getAlumnoByMatricula($matricula)){
        $_SESSION["error"] = "Alumno ya existente";
        header("Location: agregarAlumno.php");
    }else{
        $nuevoAlumno->insert();
        header("Location: index.php");
    }
    


}else{
    $data["matricula"] = "";
    $data["nombre"] = "";
    $data["apellidos"] = "";
    $data["curso"] = "";
    $data["action"] = "Agregar";
    $data["readonly"] = "";
    if(isset($_SESSION["error"])){
        $data["error"] = $_SESSION["error"];
        $data["errorVisibility"] = "visible";
        unset($_SESSION["error"]);
    }else{
        $data["error"] = "";
        $data["errorVisibility"] = "invisible";
    }
    include "../View/formularioAlumno.php";
}

?>