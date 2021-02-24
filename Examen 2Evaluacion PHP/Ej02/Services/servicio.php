<?php 
require_once "../Model/Libro.php";

$devolver = [];

function test(){
    if(!isset($_REQUEST["titulo"]) && !isset($_REQUEST["estado"])){
        return ["Codigo" => 1];
    }

    if(isset($_REQUEST["estado"]) && isset($_REQUEST["titulo"])){
        $aux = Libro::getLibroByEstadoMasNombre($_REQUEST["estado"],$_REQUEST["titulo"]);
        $aux[] = ["Codigo" => 0, "Cant" => count($aux)];
        return $aux;
    }

    if(isset($_REQUEST["estado"])){
        if($_REQUEST["estado"] != "libre"
        && $_REQUEST["estado"] != "alquilado"){

            return ["Codigo" => 2];
        }
        $aux = Libro::getLibroByEstado($_REQUEST["estado"]);
        $aux[] = ["Codigo" => 0, "Cant" => count($aux)];
        return $aux;
    }

    if(isset($_REQUEST["titulo"])){
        $aux = Libro::getLibroByNombre($_REQUEST["titulo"]);
        $aux[] = ["Codigo" => 0, "Cant" => count($aux)];
        return $aux;
    }

}

$devolver = test(); 
echo json_encode($devolver);

?>