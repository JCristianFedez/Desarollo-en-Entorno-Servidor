<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>digitos</title>
</head>

<body>
    <h1>Cantidad de digitos
    </h1>
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
            echo "$miNum tiene ".digitos($miNum)." digitos";
        }

    ?>
</body>

</html>