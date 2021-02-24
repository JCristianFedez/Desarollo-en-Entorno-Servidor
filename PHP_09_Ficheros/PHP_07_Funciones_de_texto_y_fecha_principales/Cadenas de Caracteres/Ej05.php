<!-- Intercambiar un string dado, hasta volverlo a su 
forma original:

ejemplo: Hola, ahol, laho, olah, hola (stop).  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej05</title>
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
        $rotated=$myStr;
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