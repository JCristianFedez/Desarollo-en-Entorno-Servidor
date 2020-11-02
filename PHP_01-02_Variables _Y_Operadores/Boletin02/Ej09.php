<!-- Escribe un programa que calcule el volumen de un cono mediante la fórmula V =
1
3
πr2h
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej09</title>
</head>
<body>
<center>
    <h1>Calcular volumen de un cono</h1>
    <?php
    if((!isset($_GET["radio"]))||(!isset($_GET["altura"]))){
        ?>
            <form action="#" method="get">
            <label>Radio: <input type="number" name="radio"></label>
            <br>
            <label>Altura: <input type="number" name="altura"></label>
            <br>
            <br>
            <input type="submit">
            </form>
        <?php

    }else{

        
        $radio=$_GET["radio"];
        $altura=$_GET["altura"];

        $volumen=1/3*3.14*pow($radio,2)*$altura;
        echo "el volumen es $volumen";

    }
    ?>
    </center>
</body>
</html>