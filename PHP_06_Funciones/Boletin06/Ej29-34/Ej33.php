<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrayBi</title>
</head>
<body>
<h4>punto de Silla</h4>
<?php
    include "arrayBi.php";
    $rowInd=1;
    $colInd=2;
    $myArrayBi=generaArrayBiInt(4,4,1,10);
    echo "Array<br>";
    foreach ($myArrayBi as $rows) {
        foreach ($rows as $cols) {
            echo "[$cols]";
        }
        echo "<br>";
    }
    echo "<br><br>";
    echo "Numero de la fila $rowInd y columna $colInd ";
    echo (esPuntoDeSilla($myArrayBi,$rowInd,$colInd))?"si es punto de silla":"no es punto de silla";
    echo "<br><br>";
    

    ?>
    <button onclick="window.location.reload()">Nuevo array</button>
</body>
</html>

