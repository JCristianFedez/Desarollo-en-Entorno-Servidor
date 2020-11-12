<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trozo de Numero</title>
</head>
<body>
<h1>Trozo de Numero</h1>
<?php
    include "misMatematicas.php";
    ?>
    <form action="#" method="post">
        <label for="miNum">Numero:
            <input type="number" name="miNum" id="miNum" required>
        </label>
        <br>
        <label for="start">Introduce Start:
            <input type="number" name="start" id="start" required>
        </label>
        <br>
        <label for="end">Introduce End:
            <input type="number" name="end" id="end" required>
        </label>
        <br>
        <input type="submit" value="Calcular">
    </form>

    <?php
        if (isset($_REQUEST["miNum"]) || isset($_REQUEST["start"])|| isset($_REQUEST["end"])) {
            $miNum=$_REQUEST["miNum"];
            $start=$_REQUEST["start"];
            $end=$_REQUEST["end"];
            echo "Numero: $miNum, Inicio: $start, Final: $end: Resultado: ".trozoDeNumero($miNum,$start,$end);
        }

    ?>
</body>
</html>