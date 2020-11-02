<!-- Escribe un programa que calcule el total de una factura a partir de la base imponible.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej07</title>
</head>
<body>
<center>
    <h1>Calcular factura a partir de base imponible</h1>
    <?php
    if(!isset($_GET["base"])){
        ?>
            <form action="#" method="get">
            <label>base: <input type="number" name="base"></label>
            <br>
            <label>Iva: <input type="number" name="iva"></label>
            <br>
            <input type="submit">
            </form>
        <?php

    }else{

        
        $base=$_GET["base"];
        $iva=$_GET["iva"];

        echo "IVA: ".$iva."<br>";
        echo "Base: ".$base."<br>";
        echo "La factura final es : ".($base*$iva);


    }
    ?>
    </center>
</body>
</html>