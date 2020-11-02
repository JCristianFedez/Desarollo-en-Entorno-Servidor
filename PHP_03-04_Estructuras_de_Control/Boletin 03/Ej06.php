<!-- Realiza un programa que calcule el tiempo que tardará en caer 
un objeto desde una altura h. Aplica
la fórmula
 t = √2h/g
siendo g = 9.81m/s^2
 -->
 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Ej06</title>
 </head>
 <body>
    <center>
    <h1>Calcular tiempo que tarda en caer un objeto de altura h</h1>
    <?php 
    
    if(!isset($_GET["height"])){
    ?>
    <form action="#" method="get">
    <label>Altura: <input type="number" name="height" require></label>
    <br>
    <input type="submit" value="Calcular"></form>
    <?php

    }else{
        $height=$_GET["height"];
        $g = 9.81;
        $time = sqrt(2 * $height / $g);
        echo "<h3>El objeto tarda " . round($time, 2) . " segundos en caer.</h3>";
        echo "<button onclick='window.history.go(-1)'>Comprobar otra altura</button>";
    }
    ?>
    </center>
 </body>
 </html>