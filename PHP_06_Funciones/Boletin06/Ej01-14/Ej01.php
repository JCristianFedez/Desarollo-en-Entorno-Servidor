<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EsCapicua</title>
</head>

<body>
<h1>Capicua</h1>
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
            if (esCapicua($miNum)) {
                echo "$miNum es capicua";
            } else {
                echo "$miNum no capicua";
            }
        }

    ?>

</body>

</html>