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
        $str=explode(".",$cadena);//Divido dos array
        
        echo "$rotated, ";
        do {
            //Funcion:
            //Cojo el Ultimo caracter: Hola: a
            //Pego las primeras letras despues del primer caracter: a+hol
            $rotated=substr($rotated,-1,1).substr($rotated,0,-1);
            echo "$rotated, ";
        } while ($rotated!=$myStr);
        echo " (Stop)";
    }
    ?>
</body>
</html>
