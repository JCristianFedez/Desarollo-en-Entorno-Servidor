<!-- Escribir un programa que dado un texto de un telegrama que termina en punto:
a. contar la cantidad de palabras que posean más de 10 letras
b. reportar la cantidad de veces que aparece cada vocal
c. reportar el porcentaje de espacios en blanco.
Nota: Las palabras están separadas por un espacio en blanco.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej12</title>
</head>
<body>
<form action="#" method="post">
    <label for="myTelegram">Introduce tu Telegrama</label>
    <br>
    <textarea name="myTelegram" id="myTelegram" cols="30" id="myTelegram" rows="10" required></textarea>
    <br>
    <input type="submit" value="Calcular">
</form>
    <?php
    if (isset($_REQUEST["myTelegram"])) {
        $telegram=$_REQUEST["myTelegram"];//Para calcular espacios
        $myTelegram=trim(strtolower($telegram));//Quitar espacios inicio final
        $myTelegram=implode(' ', array_filter(explode(' ', $myTelegram))); //Quitar espacios intermedios
        
        $strAux="";
        $masDiezLetras=0;
        for ($i=0; $i < strlen($myTelegram); $i++) {
            if ($myTelegram[$i]!=" ") {
                $strAux.=$myTelegram[$i];
            } else {
                $masDiezLetras+=preg_match("/........../", $strAux);
                $strAux="";
            }
        }
        $masDiezLetras+=preg_match("/........../", $strAux);

        $vocales=[["a",0],["e",0],["i",0],["o",0],["u",0]];
        for ($i=0; $i < count($vocales); $i++) {
            $vocales[$i][1]=substr_count($myTelegram, $vocales[$i][0]);
        }

        $espacios=substr_count($telegram, " ");
        $avgSpace=($espacios!=0)?$espacios/strlen($telegram)*100:0;
        round($avgSpace,2);

        echo "Hay $masDiezLetras palabras con mas de diez letras<br>";
        for ($i=0; $i < count($vocales); $i++) {
            echo "Hay ".$vocales[$i][1]." ".$vocales[$i][0]."<br>";
        }
        echo "El porcentaje de espacios es de $avgSpace%, habiendo $espacios espacios en ".strlen($telegram)." caracteres";
    }
    ?>
</body>
</html>