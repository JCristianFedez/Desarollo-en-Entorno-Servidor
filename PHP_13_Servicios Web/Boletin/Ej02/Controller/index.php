<?php 
// Formato de id = ?i=tt0000000
// $key = "apikey=d887bcdc";
$key = "apikey=e265140a";

$uri = "http://www.omdbapi.com/";
$CANT_PELIS = 8;
$a_z = "abcdefghijklmnopqrstuvwxyz";
$MAX_YEAR = 2020;
$MIN_YEAR = 1980;

// Recojo informacion de X peliculas
for ($i=0; $i < $CANT_PELIS; $i++) { 
    // Cpjo una pelicula aleatoria
    $TITLE = $a_z[rand(0,(strlen($a_z)-1))];
    $YEAR = rand($MIN_YEAR,$MAX_YEAR);
    $datos = file_get_contents("$uri?t=$TITLE&y=$YEAR&$key");
    $pelis = json_decode($datos);

    //Mientras haya algun fallo sigo recogiendo peliculas
    while($pelis->Response == "False" || $pelis->Poster == "N/A" || $pelis->Plot == "N/A"){
        $YEAR = rand($MIN_YEAR,$MAX_YEAR);
        $TITLE = $a_z[rand(0,(strlen($a_z)-1))];
        $datos = file_get_contents("$uri?t=$TITLE&y=$YEAR&$key");
        $pelis = json_decode($datos);
    }

    $id = $pelis->imdbID;
    $data["peli"][]=[
        "id" => $id,
        "poster" => $pelis->Poster,
        "title" => $pelis->Title,
        "plot" => $pelis->Plot,
        "enlace" => "https://www.imdb.com/title/$id/"
    ];

}

// print_r($data);
include "../View/paginaPrincipal.php";
?>