<!-- Escribe un programa que calcule el salario semanal de un trabajador en horas a las horas trabajadas.
Se pagarán 12 euros por hora.
 -->
 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej08</title>
</head>
<body>
<center>
    <h1>Calcular salario de un trabajador</h1>
    <?php
    if(!isset($_GET["horas"])){
        ?>
            <form action="#" method="get">
            <label>Horas trabajadas: <input type="number" name="horas" require></label>
            <br>
            <label>Dias trabajados: <input type="number" name="dias" require></label>
            <br>
            <input type="submit">
            </form>
        <?php

    }else{

        
        $horas=$_GET["horas"];
        $dias=$_GET["dias"];

        echo "Horas: $hora<br>";
        echo "Dias: $dias<br>";

        echo "El trabajador cobra ".($horas*12*$dias)." euros";


    }
    ?>
    </center>
</body>
</html>