<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrayBi</title>
</head>
<body>
<h4>Diagonal</h4>
<?php
    include "arrayBi.php";
    $rowInd=1;
    $colInd=1;
    $direc="neso";// nose = \   neso U /
    $myArrayBi=generaArrayBiInt(3,3,1,9);
    $diagonal=diagonal($myArrayBi,$rowInd,$colInd,$direc);
    echo "Array<br>";
    foreach ($myArrayBi as $rows) {
        foreach ($rows as $cols) {
            echo "[$cols]";
        }
        echo "<br>";
    }
    echo "<br><br>";
    echo "Valores de la diagonal de la fila $rowInd, columna $colInd direccion $direc: ";
    foreach ($diagonal as $value) {
        echo "[$value]";
    }
    echo "<br><br>";

    

    ?>
    <button onclick="window.location.reload()">Nuevo array</button>
</body>
</html>

