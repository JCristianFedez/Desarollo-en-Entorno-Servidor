<?php 
// $key = "apikey=d887bcdc";
$key = "apikey=e265140a";
$uri = "http://www.omdbapi.com/";
$TITLE = urlencode($_REQUEST["nombrePeli"]);

$datos = file_get_contents("$uri?s=$TITLE&$key");
$peliculas = json_decode($datos);

if(isset($pelis->Error)){
    $data["error"] = "Pelicula no existe";
}else{
    foreach ($peliculas->Search as $peli) {
        if($peli->Poster != "N/A"){
            $id = $peli->imdbID;
            $data["peli"][]=[
                "poster"=>$peli->Poster,
                "title" => $peli->Title,
                "enlace" => "https://www.imdb.com/title/$id/"
            ];
        }
    }
}

include "../View/peliculaDetalle.php";
?>