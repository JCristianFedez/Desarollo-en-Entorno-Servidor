<!-- Realiza un programa que nos diga cuántos dígitos tiene un
 número entero que puede ser positivo o
negativo. Se permiten números de hasta 5 dígitos.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej18</title>
</head>
<body>
    <center>
    <?php 
    if(!isset($_GET["num"])){

        ?>
            <form action="#" method="get">
        <label>Numero: <input type="number" name="num" require></label>
        <br>
        <input type="submit" value="Calcular">
        </form>
        <?php

    }else{
        $num=$_GET["num"];
        
        $cantDigitos=strlen(abs($num));
        echo "El numero $num tiene $cantDigitos cifras";
        echo "<br><button onclick='window.history.go(-1)'>Introducir otro numero</button>";
    }
     ?>
    </center>
</body>
</html>