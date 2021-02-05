<?php 

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

    $nuevoAlumno->insert();
    
    header("Location: index.php");

}else{
    $data["matricula"] = "";
    $data["nombre"] = "";
    $data["apellidos"] = "";
    $data["curso"] = "";
    $data["action"] = "Agregar";
    $data["readonly"] = "";
    
    include "../View/formularioAlumno.php";
}

?>