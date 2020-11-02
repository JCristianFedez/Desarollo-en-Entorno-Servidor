<!--Escribe un programa que calcule el área de un triángulo.



-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej06</title>
</head>
<body>

    <center>
    <h1>Area de un rectangulo</h1>
    <?php
    if((!isset($_GET["base"]))||(!isset($_GET["altura"]))){
        ?>
            <form action="#" method="get">
            <label>Base: <input type="number" name="base"></label>
            <br>
            <label>Altura: <input type="number" name="altura"></label>
            <br>
            <input type="submit">
            </form>
        <?php

    }else{

        
        $base=$_GET["base"];
        $altura=$_GET["altura"];

        echo "El area del triangulo con un base de $base y un altura de $altura es : ".(($base*$altura)/2);


    }
    ?>
    </center>
</body>
</html>