<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>arrayBi</title>
</head>
<body>
<h4>Cordenadas en Array</h4>
<?php
    include "arrayBi.php";
    $rowInd=1;
    $colInd=2;
    $num=4;
    $myArrayBi=generaArrayBiInt(4,4,1,10);
    $cords=coordenadasEnArrayBiInt($myArrayBi,$num);
    echo "Array<br>";
    foreach ($myArrayBi as $rows) {
        foreach ($rows as $cols) {
            echo "[$cols]";
        }
        echo "<br>";
    }
    echo "<br><br>";
    echo "Numero $num se encuentra en: ";
    for ($i=0; $i < count($cords); $i++) { 
        echo "<br>Fila: ".$cords[$i][0];
        echo "<br>Columna: ".$cords[$i][1];
        echo "<br>";
    }
    echo "<br><br>";
    

    ?>
    <button onclick="window.location.reload()">Nuevo array</button>
</body>
</html>

