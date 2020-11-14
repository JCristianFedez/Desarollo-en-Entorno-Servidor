<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
</head>
<body>
<h4>Voltea y rota array</h4>
<?php
    include "arrayUni.php";
    $myArray=generaArrayInt(10,1,50);
    $rotaciones=2;
    foreach ($myArray as $value) {
        echo "[$value] ";
    }
    echo "<br><br>";
    $myArrayRotado=volteaArrayInt($myArray);
    echo "Array Volteado: ";
    foreach ($myArrayRotado as $value) {
        echo "[$value] ";
    }

    $myArrayDer=rotaDerechaArrayInt($myArray,$rotaciones);
    echo "<br><br>Array $rotaciones rotaciones a la derecha";
    foreach ($myArrayDer as $value) {
        echo "[$value] ";
    }

    $myArrayIzq=rotaIzquierdaArrayInt($myArray,$rotaciones);
    echo "<br><br>Array $rotaciones rotaciones a la izquierda";
    foreach ($myArrayIzq as $value) {
        echo "[$value] ";
    }
    ?>
    <br>
    <button onclick="window.location.reload()">Nuevo array</button>
</body>
</html>

