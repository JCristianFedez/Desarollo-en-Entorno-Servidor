<!-- Pedir al usuario una cadena de caracteres e 
imprimirla invertida.  -->
<!-- Intercambiar un string dado, hasta volverlo a su 
forma original:

ejemplo: Hola, ahol, laho, olah, hola (stop).  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej09</title>
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
        
        echo "Frase: $myStr <br> ";
        echo "Frase inversa: ".strrev($myStr);
    }
    ?>
</body>
</html>