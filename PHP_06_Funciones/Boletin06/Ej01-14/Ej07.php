<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>digitoN</title>
</head>
<body>
<h1>Digito N</h1>
<?php
    include "misMatematicas.php";
    ?>
    <form action="#" method="post">
        <label for="miNum">Introduce numero:
            <input type="number" name="miNum" id="miNum" required>
        </label>
        <br>
        <label for="digito">Introduce digito:
            <input type="number" name="digito" id="digito" required>
        </label>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if (isset($_REQUEST["miNum"]) || isset($_REQUEST["digito"])) {
            $miNum=$_REQUEST["miNum"];
            $digito=$_REQUEST["digito"];
            echo "el Digito $digito de $miNum tiene el valor de ".digitoN($miNum,$digito);
        }

    ?>
</body>
</html>