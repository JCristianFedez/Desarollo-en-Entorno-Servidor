<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrayBi</title>
</head>
<body>
<h4>Genera arrayBi aleatorio, Coje una fila y una columna</h4>
<?php
    include "arrayBi.php";
    $rowInd=1;
    $colInd=2;
    $myArrayBi=generaArrayBiInt(4,4,1,10);
    $fila=filaDeArrayBiInt($myArrayBi,$rowInd);
    $columna=columnaDeArrayBiInt($myArrayBi,$colInd);
    echo "Array<br>";
    foreach ($myArrayBi as $rows) {
        foreach ($rows as $cols) {
            echo "[$cols]";
        }
        echo "<br>";
    }
    echo "<br><br>";

    echo "Fila $rowInd: ";
    foreach ($fila as  $value) {
        echo "[$value]";
    }
    echo "<br><br>";
    echo "Columna $colInd: ";
    foreach ($columna as $value) {
        echo "[$value]";
    }
    echo "<br><br>";

    ?>
    <button onclick="window.location.reload()">Nuevo array</button>
</body>
</html>

