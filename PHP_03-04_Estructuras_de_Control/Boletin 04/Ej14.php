<!-- Escribe un programa que pida una base y un exponente (entero positivo)
y que calcule la potencia.
 -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej14</title>
</head>
<body>
<h3>Calcular Potencia</h3>
    <?php 
    if((!isset($_REQUEST["base"]))||(!isset($_REQUEST["exp"]))){

        ?>
        <form action="#" method="post">
            <label>Base: <input type="number" name="base" required></label>
            <br>
            <label>Exponente: <input type="number" name="exp" required min="0"></label>
            <br>
            <input type="submit" value="Calcular">
        </form>
        <?php

    }else{
        $base=$_REQUEST["base"];
        $exp=$_REQUEST["exp"];
        $pow=pow($base,$exp);
        echo "$base<sup>$exp</sup> = $pow";
        echo "<br><button onclick='window.location.href=\"Ej14.php\"'>Nueva potencia</button>";

    }
    ?>
</body>
</html>