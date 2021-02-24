<?php 
if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(isset($_REQUEST["enviado"])){
    $uri = "http://localhost/PHP_Instituto/Examen%202Evaluacion%20PHP/Ej02/Services/servicio.php";


        if($_REQUEST["titulo"] != "" && $_REQUEST["estado"] != "" ){
            $datos = file_get_contents(
                $uri."?titulo=".urlencode($_REQUEST["titulo"])
                ."&estado=".urlencode($_REQUEST["estado"])
            );

        }else if($_REQUEST["titulo"] != ""){
            $datos = file_get_contents(
                $uri."?titulo=".urlencode($_REQUEST["titulo"])
            );
        }else if($_REQUEST["estado"] != ""){
            $datos = file_get_contents(
                $uri."?estado=".urlencode($_REQUEST["estado"])
            );

        }else{
            $datos = file_get_contents("$uri");
        }

$libros = json_decode($datos);
print_r($libros);

$urlFichero = "../ficheros/fichero.csv";

if(file_exists($urlFichero)){
    $aux = file($urlFichero);
    foreach ($aux as $libro) {
        $librosFichero[] = explode(",",$libro);
    }
}


if(!isset($libros->Codigo)){
    $file = fopen($urlFichero,"w");
    for ($i=0; $i < count($libros)-1; $i++) { 
        $cant = 1;
        if(isset($librosFichero)){
            foreach ($librosFichero as $l) {
                if($l[0] == $libros[$i]->Isbn){
                    $cant = $l[2];
                }
            }
        }
        $cadena = $libros[$i]->Isbn;
        $cadena .= ",".$libros[$i]->Titulo;
        $cadena .= ",".$cant;
        fwrite($file,$cadena.PHP_EOL);
    }
    fclose($file);
}

if(!isset($libros->Codigo)){
    $_SESSION["mensaje"] = (count($libros))." libros seleccionados";
}else{
    if($libros->Codigo == 1){
        $_SESSION["mensaje"] = "La consulta no ha obtenido ningun resultado";
    }else{
        $_SESSION["mensaje"] = "Debe indicar un estado valido";
    }
}
header("Location: index.php");
}
?>