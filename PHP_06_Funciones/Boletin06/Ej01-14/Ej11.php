<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pega por detras</title>
</head>
<body>
<h1>Pega por detras</h1>
<?php
    include "misMatematicas.php";
    ?>
    <form action="#" method="post">
        <label for="miNum">Introduce numero 1:
            <input type="number" name="miNum" id="miNum" required>
        </label>
        <br>
        <label for="miNum2">Introduce numero 2:
            <input type="number" name="miNum2" id="miNum2" required>
        </label>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if (isset($_REQUEST["miNum"]) || isset($_REQUEST["miNum2"])) {
            $miNum=$_REQUEST["miNum"];
            $miNum2=$_REQUEST["miNum2"];
            echo "Numero 1 [$miNum], Numero 2 [$miNum2], numeros pegados: ".pegaPorDetras($miNum,$miNum2);
        }

    ?>
</body>
</html>