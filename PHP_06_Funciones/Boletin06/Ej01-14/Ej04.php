<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>potencia</title>
</head>
<body>
<h1>Potencia</h1>
<?php
    include "misMatematicas.php";
    ?>
    <form action="#" method="post">
        <label for="base">Introduce base:
            <input type="number" name="base" id="base" required>
        </label>
        <br>
        <label for="exp">Introduce exp:
            <input type="number" name="exp" id="exp" required>
        </label>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if (isset($_REQUEST["base"]) || isset($_REQUEST["exp"])) {
            $base=$_REQUEST["base"];
            $exp=$_REQUEST["exp"];
            echo "$base <sup>$exp</sup> = ".potencia($base,$exp);
        }

    ?>
</body>
</html>