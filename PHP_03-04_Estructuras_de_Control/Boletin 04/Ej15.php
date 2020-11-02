<!-- Escribe un programa que dados dos números, uno real (base) y un 
entero positivo (exponente), saque por pantalla todas las potencias 
con base el numero dado y exponentes entre uno y el exponente introducido.
No se deben utilizar funciones de exponenciación. Por ejemplo, si 
introducimos el 2 y el 5, se deberán mostrar 2¹, 2², 2³, 2⁴, 2⁵. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ej15</title>
</head>
<body>
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
        for ($i=1; $i <= $exp; $i++) { 
            $pow=$base;
            for ($j=1; $j < $i; $j++) { 
                $pow*=$base;
            }
            echo "$base<sup>$i</sup> = $pow<br>";
        }
        echo "<br><button onclick='window.location.href=\"Ej14.php\"'>Nueva potencia</button>";

    }
    ?>
</body>
</html>