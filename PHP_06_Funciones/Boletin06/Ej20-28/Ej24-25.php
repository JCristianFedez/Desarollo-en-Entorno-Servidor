<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array</title>
</head>
<body>
<h4>Dice si un numero esta en un array, devuelve las ocurencias de dicho numero</h4>
<?php
    include "arrayUni.php";
    $myArray=generaArrayInt(20,1,50);
    $num=18;
    foreach ($myArray as $value) {
        echo "[$value] ";
    }
    echo "<br>";
    if(estaEnArrayInt($myArray,$num)){
        echo "El valor $num se encuentra en el array <br>";
        $ocurrencias=posicionEnArray($myArray,$num);
        echo "Se encuentra en las posicoines : ";
        foreach ($ocurrencias as $value) {
            echo "[$value] ";
        }
    }else{
        echo "El valor $num no se encuentra en el array<br>";
    }
    ?>
    <br>
    <button onclick="window.location.reload()">Nuevo array</button>
</body>
</html>

