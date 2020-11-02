<!--Realiza un programa que pida dos números y luego muestre el resultado de su multiplicación.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej01</title>
</head>
<body>

    <center>
    <?php
    if((!isset($_GET["n1"]))||(!isset($_GET["n2"]))){
        ?>
            <h1>Introduzca dos numeros los cuales luego se multimplicaran</h1>
            <form action="#" method="get">
            <label>Numero 1: <input type="number" name="n1"></label>
            <br>
            <label>Numero 2: <input type="number" name="n2"></label>
            <br>
            <input type="submit">
            </form>
        <?php

    }else{

        
        $n1=$_GET["n1"];
        $n2=$_GET["n2"];

        echo "$n1 * $n2 = ".($n1*$n2);

    }
    ?>
    </center>
</body>
</html>