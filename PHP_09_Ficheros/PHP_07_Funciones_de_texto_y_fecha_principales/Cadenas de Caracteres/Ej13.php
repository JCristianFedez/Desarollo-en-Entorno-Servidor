<!-- Escribir un programa que dado un texto que finaliza en punto, se pide:
a. la posición inicial de la palabra más larga y su longitud
b. cuantas palabras con una longitud entre 8 y 16 caracteres poseen más de tres veces
la vocal “a”
Nota: 1.- Las palabras pueden estar separadas por uno o más espacios en blanco. 
2.- Pueden haber varios espacios en blanco antes de la primera palabra y 
también después de la última. 
3.- Se considera que una palabra finaliza cuando se encuentra un espacio en
blanco o un signo de puntuación.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej13</title>
</head>
<body>
<form action="#" method="post">
    <label for="myText">Introduce tu Texto</label>
    <br>
    <textarea name="myText" id="myText" cols="30" id="myText" rows="10" required></textarea>
    <br>
    <input type="submit" value="Calcular">
</form>
    <?php
    if (isset($_REQUEST["myText"])) {
        $texto=$_REQUEST["myText"];//Para calcular espacios
        $myText=trim(strtolower($texto));//Quitar espacios inicio final
        $myText=implode(' ', array_filter(explode(' ', $myText))); //Quitar espacios intermedios

        $aux="";
        $longerWord=["",0];
        $wordBetween8And16=0;
        for ($i=0; $i < strlen($myText); $i++) { 
            if($myText[$i]!=" "){
                $aux.=$myText[$i];

            }
            if($myText[$i]==" " || $i==strlen($myText)-1){//Compara si es una nueva palabra o si es la ultima
                if(strlen($aux)>strlen($longerWord[0])){//Palabra mas larga
                    $longerWord[0]=$aux;
                    $longerWord[1]=strpos($texto,$aux);
                }
                if(strlen($aux)>=8 && strlen($aux)<=16){//Palabras entre 8 y 16 letras y con tres a
                    $wordBetween8And16+=(substr_count($aux,"a")>3)?1:0;//Mas de tres a
                }
                $aux="";
            }
        }

        echo "Palabra mas larga: ".$longerWord[0].", empieza en la posicion ".$longerWord[1]."<br>";
        echo "Palabras entre 8 y 16 caracteres con mas de tres a : $wordBetween8And16";
    }
    ?>
</body>
</html>