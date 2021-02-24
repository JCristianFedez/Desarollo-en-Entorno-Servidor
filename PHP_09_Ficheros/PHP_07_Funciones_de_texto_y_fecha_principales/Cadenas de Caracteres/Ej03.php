<!-- Contar cuantas palabras tiene una frase. Recuerde que la
gramática establece que una frase termina en un punto -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej03</title>
</head>
<body>
<form action="#" method="post">
    <label for="myStr">Introduce frase</label>
    <input type="text" name="myStr" id="myStr" required>
    <br>
    <input type="submit" value="Modificar">
</form>
    <?php
    if(isset($_REQUEST["myStr"])){
        $myStr=$_REQUEST["myStr"];

        echo "Frase: $myStr tiene ".str_word_count($myStr,0)." palabras";


        //Forma Propia
        /* $myStrMod=$myStr;
        trim($myStrMod);
        while(mb_stripos($myStrMod,"  ")){
            $myStrMod=str_replace("  "," ",$myStrMod);
        }
        $myStrMod=explode(" ",$myStrMod);
        echo "Frase: $myStr tiene ".count($myStrMod)." palabras"; */
    }
    ?>
</body>
</html>