<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>posicion de digito</title>
</head>
<body>
<h1>Position de digito</h1>
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
            echo "La primera ocurrencia de $digito en $miNum se encuntra en la posicion: ".posicionDeDigito($miNum,$digito);
        }

    ?>
</body>
</html>