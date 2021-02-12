<?php 
// $key = "apikey=d887bcdc";
$key = "apikey=e265140a";
$uri = "http://www.omdbapi.com/";
// Formato de id = ?i=tt0000000
$MAX_ID = 2000000;
$MIN_ID = 0500000;
$aux = 0;
do {
    $id = str_pad(rand($MIN_ID,$MAX_ID), 7, "0", STR_PAD_LEFT);
    $datos = file_get_contents("$uri?i=tt$id&$key");
    $peli = json_decode($datos);
    $aux++;
} while ($peli->Response == "False" || $peli->Poster == "N/A" || $peli->Plot == "N/A");
echo "<script>console.log($aux)</script>";

$id = $peli->imdbID;
$data["peli"][]=[
    "poster"=>$peli->Poster,
    "title" => $peli->Title,
    "plot" => $peli->Plot,
    "enlace" => "https://www.imdb.com/title/$id/"
];

include "../View/detallePelicula.php";
?>