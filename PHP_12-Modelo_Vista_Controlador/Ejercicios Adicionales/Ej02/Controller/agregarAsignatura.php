<?php 

if(isset($_REQUEST["guardar"])){
    require_once "../Model/Asignatura.php";
    
    $id = $_REQUEST["id"];
    $nombre = $_REQUEST["nombre"];

    $nuevaAsignatura = new Asignatura(
        $id,
        $nombre
    );

    $nuevaAsignatura->insert();
    
    header("Location: verAsignaturas.php");

}else{
    $data["id"] = "autoincremental";
    $data["nombre"] = "";
    $data["action"] = "Agregar";
    $data["readonly"] = "readonly";
    
    include "../View/formularioAsignatura.php";
}

?>