<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>esPrimo</title>
</head>
<body>
<h1>Primo</h1>
<?php
    include "misMatematicas.php";
    ?>
    <form action="#" method="post">
        <label for="miNum">Introduce numero:
            <input type="number" name="miNum" id="miNum" required>
        </label>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if (isset($_REQUEST["miNum"])) {
            $miNum=$_REQUEST["miNum"];
            if (esPrimo($miNum)) {
                echo "$miNum es primo";
            } else {
                echo "$miNum no es primo";
            }
        }
    ?>
</body>
</html>

