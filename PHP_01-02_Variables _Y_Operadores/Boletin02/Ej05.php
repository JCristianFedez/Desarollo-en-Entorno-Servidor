<!--Escribe un programa que calcule el área de un rectángulo.


-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej05</title>
</head>
<body>

    <center>
    <h1>Area de un rectangulo</h1>
    <?php
    if((!isset($_GET["lado"]))||(!isset($_GET["alto"]))){
        ?>
            <form action="#" method="get">
            <label>Lado: <input type="number" name="lado"></label>
            <br>
            <label>Alto: <input type="number" name="alto"></label>
            <br>
            <input type="submit">
            </form>
        <?php

    }else{

        
        $lado=$_GET["lado"];
        $alto=$_GET["alto"];

        echo "El area del rectangolo con un lado de $lado y un alto de $alto es : ".($lado*$alto);


    }
    ?>
    </center>
</body>
</html>