<!--Escribe un programa que sume, reste, multiplique y divida dos números introducidos por teclado.

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
    <h1>Operaciones Matematicas</h1>
    <?php
    if((!isset($_GET["n1"]))||(!isset($_GET["n2"]))){
        ?>
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

        echo "$n1 + $n2 = ".($n1+$n2)."<br>";
        echo "$n1 - $n2 = ".($n1-$n2)."<br>";
        echo "$n1 * $n2 = ".($n1*$n2)."<br>";
        echo "$n1 / $n2 = ".($n1/$n2)."<br>";


    }
    ?>
    </center>
</body>
</html>