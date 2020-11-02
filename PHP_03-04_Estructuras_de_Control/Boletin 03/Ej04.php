<!-- Vamos a ampliar uno de los ejercicios de la relación anterior 
para considerar las horas extras. Escribe un programa que calcule
el salario semanal de un trabajador teniendo en cuenta que las horas
ordinarias (40 primeras horas de trabajo) se pagan a 12 euros 
la hora. A partir de la hora 41, se pagan a 16 euros la hora.
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej04</title>
</head>
<body>
    <center>
    <?php 
    if(!isset($_GET["hours"])){
        ?>
            <h1>Calcular Salario</h1>
            <form action="#" method="get">
            <label>Horas trabajadas: <input type="number" name="hours" id=""></label>
            <br>
            <input type="submit" value="Calcular"></form>
        <?php
    }else{
        $hours=$_GET["hours"];
        $extHours=($hours>40)? $hours-40 : 0;
        $hours=($hours>40)? 40 : $hours;
        $salario=($hours*12)+($extHours*16);
        echo "<h2>Cobras $salario</h2>";
        echo "<h3>Horas Extras = $extHours</h3>";
        echo "<h3>Horas Estandares = $hours</h3>";
        echo "<button onclick='window.history.go(-1)'>Comprobar otro sueldo</button>";
    } ?>
    </center>
</body>
</html>