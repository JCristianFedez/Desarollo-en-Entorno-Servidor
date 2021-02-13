<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

// $key = "apikey=d887bcdc";
$key = "apikey=e265140a";
$uri = "http://www.omdbapi.com/";
$PELIS_POR_PAG = 10;

// Lo siguiente es para saber si tengo que recalular el numero de paginas
if(isset($_REQUEST["nombrePeli"])){
    $TITLE = urlencode($_REQUEST["nombrePeli"]);
    $_SESSION["nombrePeli"] = urlencode($_REQUEST["nombrePeli"]);
    unset($_SESSION["cantPaginas"]);
    header("Location: buscarPeli.php");

}else{
    $TITLE = $_SESSION["nombrePeli"];
}

$data["pag"] = (isset($_REQUEST["pag"]))?$_REQUEST["pag"]:1;

$datos = file_get_contents("$uri?page=".$data["pag"]."&s=$TITLE&$key");
$peliculas = json_decode($datos);

if($peliculas->Response == "False"){
    $data["error"] = "La Pelicula ".$_REQUEST["nombrePeli"]." no se encuentra";
}else{
    
    // Calculo cuantas paginas van a ser necesarias
    if(!isset($_SESSION["cantPaginas"])){
        $pagAux = 0;
        while((count($peliculas->Search) == 10)){
            foreach ($peliculas->Search as $peli) {
                if($peli->Poster != "N/A"){
                    $data["pag"]++;
                }
            }
            $pagAux++;
            $datos = file_get_contents("$uri?page=$pagAux&s=$TITLE&$key");
            $peliculas = json_decode($datos);
        }
        $data["pag"] /= $PELIS_POR_PAG;
        $_SESSION["cantPaginas"] = floor($data["pag"]);
    }

    if($peliculas->totalResults == 1){
            if($peliculas->Search[0]->Poster != "N/A"){
                $id = $peliculas->Search[0]->imdbID;
                $data["peli"][]=[
                    "poster"=>$peliculas->Search[0]->Poster,
                    "title" => $peliculas->Search[0]->Title,
                    "enlace" => "https://www.imdb.com/title/$id/",
                    "id" => $peliculas->imdbID
                ];
            }
    }else{

            foreach ($peliculas->Search as $peli) {
                if($peli->Poster != "N/A"){
                    $id = $peli->imdbID;
                    $data["peli"][]=[
                        "poster"=>$peli->Poster,
                        "title" => $peli->Title,
                        "enlace" => "https://www.imdb.com/title/$id/",
                        "id" => $peli->imdbID
                    ];
                }
            }
            $datos = file_get_contents("$uri?page=".$data["pag"]."&s=$TITLE&$key");
            $peliculas = json_decode($datos);
    }
}

if($data["pag"] == $_SESSION["cantPaginas"] || $data["pag"] == 1){
    $data["paginatedClass"] = "disabled";
}else{
    $data["paginatedClass"] = "";
}
include "../View/peliculaABuscar.php";
?>