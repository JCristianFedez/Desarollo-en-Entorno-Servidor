<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
</head>
<body>
<h4>Genera array aleatorio, Señala el minimo, maximo y el promedio</h4>
<?php
    include "arrayUni.php";
    $myArray=generaArrayInt(20,1,100);
    $min=minimoArrayInt($myArray);
    $max=maximoArrayInt($myArray);
    $avg=mediaArrayInt($myArray);
    foreach ($myArray as $value) {
        echo "[$value] ";
    }
    echo "<br>";
    echo "El minimo es $min";
    echo "<br>";
    echo "El maximo es $max";
    echo "<br>";
    echo "El promedio es $avg";
    echo "<br>";
    ?>
    <button onclick="window.location.reload()">Nuevo array</button>
</body>
</html>

