<!-- Dado un párrafo con dos frases (separadas por un punto), 
contar cuántas palabras tiene cada frase.  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej06</title>
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
        $cadena=implode(' ',array_filter(explode(' ',$myStr))); //Quito espacios
        $frases;
        $aux="";

        for ($i=0; $i < strlen($myStr); $i++) { //Sirve para muchas frases
            if($myStr[$i]=="." && $aux!=""){
                $frases[]=$aux;
                $aux="";
            }else if($myStr[$i]!="."){//Por si pone varios . seguidos que no los pille como palabra
                $aux.=$myStr[$i];
            }
        }
        $frases[]=$aux;

        echo "Frase: $myStr<br>";
        for ($i=0; $i < count($frases); $i++) { 
            echo "Oracion $i: [".$frases[$i]."] tiene ".str_word_count($frases[$i])." palabras<br>";
        }

        //Solo para dos frases, es decir un punto
/*         $frase1=substr($cadena,0,mb_strpos($cadena,"."));
        $frase2=substr($cadena,mb_strpos($cadena,".")+1);
        echo "Frase: $myStr<br>";
        echo "Oracion1: $frase1 = ".str_word_count($frase1)." palabras<br>";
        echo "Oracion2: $frase2 = ".str_word_count($frase2)." palabras<br>"; */
    }
    ?>
</body>
</html>
