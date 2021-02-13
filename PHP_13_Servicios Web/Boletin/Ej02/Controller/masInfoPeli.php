<?php 

if(!isset($_REQUEST["idPeli"])){
    require_once "../Model/calcularIdAleatoria.php";
}else {
    $id = $_REQUEST["idPeli"];
}


// $key = "apikey=d887bcdc";
$key = "apikey=e265140a";
$uri = "http://www.omdbapi.com/";
// Formato de id = ?i=tt0000000

$datos = file_get_contents("$uri?i=$id&$key");
$peli = json_decode($datos);


$id = $peli->imdbID;
$data["peli"]=[
    "poster"=>$peli->Poster,
    "title" => $peli->Title,
    "plot" => $peli->Plot,
    "enlace" => "https://www.imdb.com/title/$id/",
    "director" => $peli->Director,
    "estreno" => $peli->Year,
    "genero" => $peli->Genre,
    "actores" => $peli->Actors
];
if(isset($peli->Ratings[0]->Value)){
    $data["peli"]["puntos"] = $peli->Ratings[0]->Value;
}else{
    $data["peli"]["puntos"] = "";

}
include "../View/detallePelicula.php";
?>