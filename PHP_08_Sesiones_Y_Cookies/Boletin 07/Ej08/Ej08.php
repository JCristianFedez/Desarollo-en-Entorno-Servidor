<!-- Realiza un programa que escoja al azar 5 palabras en inglés de un mini-diccionario. El programa
pedirá que el usuario teclee la traducción al español de cada una de las palabras y comprobará si son
correctas. Al final, el programa deberá mostrar cuántas respuestas son válidas y cuántas erróneas.
La aplicación debe tener una opción para introducir los pares de palabras (inglés - español) que se
deben guardar en cookies; de esta forma, si de vez en cuando se dan de alta nuevas palabras, la
aplicación puede llegar a contar con un número considerable de entradas en el mini-diccionario -->
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}


    
if (isset($_REQUEST["accion"])) {
    //Actualizar COokies
    if ($_REQUEST["accion"] == "actualizarCookies") {
        foreach ($_SESSION["diccionario"] as $spanish => $english) {
            setcookie($spanish, $english, time()+1*24*3600);
        }
    } elseif ($_REQUEST["accion"] == "borrarCookies") {//Borar cokies y sesiones
        foreach ($_SESSION["diccionario"] as $spanish) {
            setcookie($spanish, null, -1);
        }
        unset($_SESSION["diccionario"]);
    }
}

    //el if es porque almacena el identificador por defecto
    //Cargo las palabras de las cookies a z
    foreach ($_COOKIE as $spanish => $english) {
        if ($spanish != "PHPSESSID") {
            $_SESSION["diccionario"][$spanish]=$english;
        }
    }
    
//Si no tuviera cookie de diccionario cargo uno con sesion
if (!isset($_SESSION["diccionario"])) {
    $_SESSION["diccionario"]=[
        "gato" => "cat",
        "perro" => "dog",
        "vietdo" => "wind",
        "brazo" => "body",
        "dinero" => "money",
        "mesa" => "table",
        "nube" => "cloud",
        "sol" => "sun",
        "bola" => "ball",
        "coche" => "car",
        "equipo" => "team"
    ];
}

$diccionario=$_SESSION["diccionario"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej08</title>
</head>
<body>
    <?php
    if (!isset($_REQUEST["espanol"])) {//Se introducen las palabras
        echo "Introduzca la traduccion al ingles de las siguientes palabras <br>";

        //Cojo las palabras españolas
        foreach ($diccionario as $spanish => $english) {
            $spanishWords[]=$spanish;
        }

        //Elijo 5 palabras al azar
        $randArray = range(0, count($spanishWords)-1);
        shuffle($randArray);
        for ($i=0; $i < 5; $i++) {
            $espanol[]=$spanishWords[$randArray[$i]];
        }
        
        echo "<form action='#' method='post'>";
        for ($i=0; $i < 5; $i++) {
            ?>
            <label for="<?=$espanol[$i]?>"><?=$espanol[$i]?> = </label>
            <input type="hidden" name="espanol[]" value="<?=$espanol[$i]?>">
            <input type="text" name="ingles[]" id="<?=$ingles[$i]?>" required>
            <br>
            <?php
        }
        echo "<input type='submit' value='Comprobar'>";
        echo "</form>";
    } else {//Se muestran los fallos y aciertos
        $espanol=$_REQUEST["espanol"];
        $ingles=$_REQUEST["ingles"];

        for ($i=0; $i < 5; $i++) {
            echo $espanol[$i]." = ".$ingles[$i];
            if ($diccionario[$espanol[$i]] == $ingles[$i]) {
                echo " CORECTO";
            } else {
                echo " INCORRECTO, la traduccion es ".$diccionario[$espanol[$i]];
            }
            echo "<br>";
        }
    }?>
    <br>
    <br>
    <br>
    <hr>
    <form action="#" method="post">
        <input type="submit" value="Jugar otra vez">
    </form>
    <br>
    <hr>
    <form action="administrarPalabras.php" method="post">
        <input type="submit" value="Administrar palabras">
    </form>
</body>
</html>